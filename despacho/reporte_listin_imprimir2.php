<?php
session_start();
//$id_factura = isset($_SESSION['id_factura']);
if(isset($_SESSION['nombre'])) {
?>
<!DOCTYPE html><head>
  <title></title>
  <meta charset="utf-8">
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
.inposdom{
  font-size: 30px;
  /*margin-left: 30%;*/
}
@media all {
    .page-break { display: none; }
}

@media print {
    .page-break { display: block; page-break-before: always; }
}

</style>
</head>
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_resumen.php";
}
setTimeout("redireccionarPagina()", 4000);

</script>
<script type="text/javascript">window.print();</script>
<?php 
include 'conexion.php';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$fecha1 = date('d-m-Y');
 ?>
<img style="float: left" src="img/inposdom.gif">
<div class="inposdom"><center>INSTITUTO POSTAL DOMINICANO</center></div>
<p><center><span style="font-size: 20px;">DIRECCION DE OPERACIONES<BR/>DEPARTAMENTO DESPACHO GENERAL</span></center></p>
<p><center><span style="font-size: 20px;">"Años de la Atención Intengral a la Primera Infancia"</span></center></p>
<br><br>
<p style="float: left; font-size: 15px;">RELACION ENTREGA DE VALIJAS AL LISTIN DIARIO<br>REGION NORTE O CIBAO</p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha1"; ?></p>
<br>
<table class="table table-bordered" >
    <thead>
    <tr>
    <th>Estafeta</th>
    <th>Cantidad</th>
    <th>Valijas</th>
    <th>Precinto</th>
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
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND division_regional.id_division = 2 AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND division_regional.id_division = 2 AND colectora IS NULL 
ORDER BY provincia;
";
$result1= mysql_query($sql) or die(mysql_error());
$number_of_rows1 = mysql_num_rows($result);  
; 
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['provincia'] . '</td>';
                 echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['Valijas'] . '</td>';
                  echo '<td>'. $row['Precinto'] . '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
 </tbody>
</table> 
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<img style="float: left" src="img/inposdom.gif">
<div class="inposdom"><center>INSTITUTO POSTAL DOMINICANO</center></div>
<p><center><span style="font-size: 20px;">DIRECCION DE OPERACIONES<BR/>DEPARTAMENTO DESPACHO GENERAL</span></center></p>
<p><center><span style="font-size: 20px;">"Años de la Atención Intengral a la Primera Infancia"</span></center></p>
<br><br>
<p style="float: left; font-size: 15px;">RELACION ENTREGA DE VALIJAS AL LISTIN DIARIO<br>REGION ESTE</p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha1"; ?></p>
<br>
<table class="table table-bordered" >
    <thead>
    <tr>
    <th>Estafeta</th>
    <th>Cantidad</th>
    <th>Valijas</th>
    <th>Precinto</th>
    </tr>
    </thead>
    <tbody>
                  <?php 
   error_reporting(E_ALL ^ E_NOTICE);
  $pdo = Database::connect();
  $sql = "SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND division_regional.id_division = 4 AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND division_regional.id_division = 4 AND colectora IS NULL 
ORDER BY provincia;
";
$result2= mysql_query($sql) or die(mysql_error());
$number_of_rows2 = mysql_num_rows($result);  
; 
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['provincia'] . '</td>';
                 echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['Valijas'] . '</td>';
                  echo '<td>'. $row['Precinto'] . '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
 </tbody>
</table> 
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<img style="float: left" src="img/inposdom.gif">
<div class="inposdom"><center>INSTITUTO POSTAL DOMINICANO</center></div>
<p><center><span style="font-size: 20px;">DIRECCION DE OPERACIONES<BR/>DEPARTAMENTO DESPACHO GENERAL</span></center></p>
<p><center><span style="font-size: 20px;">"Años de la Atención Intengral a la Primera Infancia"</span></center></p>
<br><br>
<p style="float: left; font-size: 15px;">RELACION ENTREGA DE VALIJAS AL LISTIN DIARIO<br>REGION SUR</p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha1"; ?></p>
<br>
<table class="table table-bordered" >
    <thead>
    <tr>
    <th>Estafeta</th>
    <th>Cantidad</th>
    <th>Valijas</th>
    <th>Precinto</th>
    </tr>
    </thead>
    <tbody>
                  <?php 
   error_reporting(E_ALL ^ E_NOTICE);
  $pdo = Database::connect();
  $sql = "SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'EM'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND division_regional.id_division = 3 AND colectora IS NOT NULL 
GROUP BY colectora
UNION
SELECT cantidad,CASE WHEN  colectora IS NOT NULL  THEN 'VC'
 WHEN  servicio  = 'COLIS POSTAL'  THEN 'CP'
 WHEN  servicio  = 'EMS'  THEN 'EMS'
 WHEN  servicio  = 'BULTO POSTAL'  THEN 'BP'
  WHEN  servicio  = 'CERTIFICADO'  THEN 'R'
  WHEN  servicio  = 'ORDINARIO'  THEN 'ORD'
   WHEN  servicio  = 'MARITIMA'  THEN 'M'
   WHEN  servicio  = 'TRANSITO'  THEN 'T'
   WHEN  servicio  = 'MENSAJERIA'  THEN 'ME'
   WHEN  servicio  = 'ALMACEN'  THEN 'ALM'
   WHEN  servicio  = 'E.ESPECIAL'  THEN 'EE'
   WHEN  servicio  = 'DEVUELTO'  THEN 'EE'
  ELSE servicio
END 'Valijas' ,
CASE WHEN  colectora IS NOT NULL  THEN colectora
  ELSE LEFT(presinto_servicio,6)
END 'Precinto' ,region.nombre_region AS provincia
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE fecha_entrada = '$fecha' AND division_regional.id_division = 3 AND colectora IS NULL 
ORDER BY provincia;
";
$result3= mysql_query($sql) or die(mysql_error());
$number_of_rows3 = mysql_num_rows($result);  
; 
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['provincia'] . '</td>';
                 echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['Valijas'] . '</td>';
                  echo '<td>'. $row['Precinto'] . '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
 </tbody>
</table> 
<br>
<table border="1" width="100%" height="50px">
  <tr>
    <td>ENTREGADO POR: ROBINSON ESQUEA</td>
    <td>RECIBIDO POR: GERARDO NOVA</td>
    <td>INSPECTOR POSTAL</td>
  </tr>
</table>
</body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>