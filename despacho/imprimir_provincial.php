<?php
session_start();

if(isset($_SESSION['nombre'])) {

?>
<html> 
<head>
  <title>INSTITUTO POSTAL DOMINICANO</title>
</head>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<meta charset="UTF-8">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_provincial.php";
}
setTimeout("redireccionarPagina()", 8000);

</script>
<style type="text/css">
.inposdom{
  font-size: 25px;
  margin-left: 10px;
}
</style>

<script type="text/javascript">window.print();</script>
<?php
include 'conexion.php';
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$monitores = isset($_GET['monitores']) ? $_GET['monitores'] : null ;
$oficiales = isset($_GET['oficiales']) ? $_GET['oficiales'] : null ;
$fecha1 = date('d-m-Y');
?>
<body> 
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE <?php echo $destino1; ?></span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha1"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                      <th>Presinto-Externo</th>
                       <th>Despacho</th>
                       <th>Cantidad</th>
                       <th>Colectora</th>
                       <th>Peso</th>
                       <th>Destino</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
   error_reporting(E_ALL ^ E_NOTICE);
  include 'database.php';
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  DATE_FORMAT(fecha_entrada,'%Y/%m/%d') = DATE_FORMAT(SYSDATE(),'%Y/%m/%d') AND customers.destino = '$destino1' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';
                   echo '<td>'. $row['presinto_externo'] . '</td>';
                  echo '<td>'. $row['despacho_general'] . '</td>';
                  echo '<td>'. $row['cantidad'] . '</td>';
                  echo '<td>'. $row['colectora'] . '</td>';
                  echo '<td>'. $row['peso_real'] . '</td>';
                  echo '<td>'. $row['destino'] . '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
            ?>
              </tbody>

              </table>

<div class="manuel">Firma del Inspector:_______________________________</div>
</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>