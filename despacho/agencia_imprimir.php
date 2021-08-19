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
  <style type="text/css">
@media all {
    .page-break { display: none; }
}

@media print {
    .page-break { display: block; page-break-before: always; }
}
.inposdom{
  font-size: 25px;
  margin-left: 10px;
}
</style>
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_provincial.php";
}
setTimeout("redireccionarPagina()", 9000);

</script>
<script type="text/javascript">window.print();</script>
<?php
include 'conexion.php';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null ;
?>
<body> 
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE GUALEY</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'GUALEY' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE GUARICANOS</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'GUARICANOS' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE GUERRA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'GUERRA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE HAINA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'HAINA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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

<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE HERRERA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'HERRERA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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

<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE HUACAL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'HUACAL' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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

<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LA FE</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'LA FE' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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

<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LA VICTORIA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'LA VICTORIA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LOS ALCARRIZOS</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'LOS ALCARRIZOS' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LOS JARDINES</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'LOS JARDINES' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LOS MAMEYES</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'LOS MAMEYES' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LOS MINAS</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'LOS MINAS' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MANOGUAYABO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'MANOGUAYABO' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MEGACENTRO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'MEGACENTRO' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MEJORAMIENTO SOCIAL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'MEJORAMIENTO SOCIAL' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MULTICENTRO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'MULTICENTRO' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE OZAMA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'OZAMA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PEDRO BRAND</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'PEDRO BRAND' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PLAZA CENTRAL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'PLAZA CENTRAL' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SABANA PERDIDA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'SABANA PERDIDA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN ISIDRO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'SAN ISIDRO' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN JOSE DE OCOA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'SAN JOSE DE OCOA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN MARTIN</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'SAN MARTIN' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE UASD</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'UASD' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VILLA DUARTE</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'VILLA DUARTE' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VILLA MELLA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'VILLA MELLA' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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
<div class="page-break"></div>
<img style="float: left" width="100px" height="150px" src="img/inposdom.gif">
<p><span class="inposdom">INSTITUTO POSTAL DOMINICANO</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DIRECCION DE OPERACIONES</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">DESPACHO GENERAL</span></p>
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE ZONA COLONIAL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>  <th>Presinto-Externo</th>
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
  $pdo = Database::connect();
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad,colectora,sum(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM narisol_bladi.customers
INNER JOIN narisol_bladi.estafeta 
ON (customers.destino = estafeta.destino)
INNER JOIN narisol_bladi.region 
ON (estafeta.ID_REGION = region.ID_REGION)
INNER JOIN narisol_bladi.division_regional 
ON (region.Id_division = division_regional.id_division) 
WHERE CONDICION_GENERAL = 1 AND  fecha_entrada = '$fecha' AND customers.destino = 'ZONA COLONIAL' AND servicio <> 'COLIS POSTAL'
GROUP BY presinto_servicio,destino,servicio,presinto_externo
ORDER BY servicio;";
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                 echo '<td>'. $row['servicio'] . '</td>';
                  echo '<td>'. $row['presinto_servicio'] . '</td>';echo '<td>'. $row['presinto_externo'] . '</td>';
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

</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>