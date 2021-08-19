<?php
session_start();
if(isset($_SESSION['nombre'])) {
?>
<!DOCTYPE html><head>
  <title></title>
  <style type="text/css">
  .d{
    float:left;
    margin-right: 5px;
    text-align: center;
    font-size: 15px;
    width: 220px;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    border-spacing:  0px;
    }
#contenedor{
  width: 350px;
  height: auto;
  border-style:solid;
  float: left;
  margin-left: 5px;
  margin-top: 5px;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
td{
  font-size: 11.6px;
 
}
.o{
  text-align: center;
  border-spacing:  0px;
}
#contenedor2{
  width: 350px;
  height: auto;
  border-style:solid;
  float: left;
  margin-left: 5px;
  margin-top: 5px;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
.manuel{
  float: left;
}
.jean{
  float: right;
}
.inposdom{
  font-size: 35px;
  margin-left: 10px;
}
</style>
</head>
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "ruta1_postal.php";
}
setTimeout("redireccionarPagina()", 4000);

</script>
<script type="text/javascript">window.print();</script>
<?php 
include 'conexion.php';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
?>
<img style="float: left" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 30px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 30px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 25px; margin-left: 10px;">REPORTE DE ENTREGA VALIJAS(CARTA DE RUTA) LOCAL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered"  >
                  <thead>
                    <tr>
                    <th>Estafeta</th>
                       <th>Cantidad</th>
                      <th>Valijas</th>
                       <th>Precinto</th>
                       <th>Firma/sello</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
   error_reporting(E_ALL ^ E_NOTICE);
  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIA'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha'  AND colectora IS NOT NULL AND division_regional.nombre = 'CIUDAD' AND estafeta.ruta_postal  = 1
 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIA'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'ME'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'M'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE presinto_servicio
END 'Precinto' ,division_regional.nombre AS region ,region.nombre_region AS provincia,SYSDATE() AS fecha,customers.destino  AS estafeta
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  fecha_entrada = '$fecha' AND colectora IS NULL AND division_regional.nombre = 'CIUDAD' AND estafeta.ruta_postal  = 1
ORDER BY estafeta";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['estafeta'] . '</td>';
                 echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['Valijas'] . '</td>';
                  echo '<td>'. $row['Precinto'] . '</td>';
                  echo '<td height="80px" align="bottom">__________________________________</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>

              </table>

<div class="manuel">Firma del Inspector:_______________________________</div>
<div class="jean">Firma del Postal Inposdom:_______________________________</div>
</body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>