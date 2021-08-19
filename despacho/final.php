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
  window.location = "reporte_destino.php";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE ALTAMIRA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>

<table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'ALTAMIRA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE AZUA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'AZUA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE BANI</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BANI' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE BARAHONA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BARAHONA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE BAVARO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BAVARO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE BAYAGUANA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BAYAGUANA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE BONAO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BONAO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE CABRAL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'CABRAL' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE CASTILLO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'CASTILLO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE COTUI</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'COTUI' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE DAJABON</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'DAJABON' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE DUVERGE</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'DUVERGE' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE EL SEYBO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'EL SEYBO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE ELIAS PINA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'ELIAS PINA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE ESPERANZA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'ESPERANZA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE GASPAR HERNANDEZ</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'GASPAR HERNANDEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE HATO MAYOR</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'HATO MAYOR' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE HIGUEY</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'HIGUEY' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE IMBERT</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'IMBERT' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE JUAN DOLIO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'JUAN DOLIO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LA ROMANA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LA ROMANA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LA VEGA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LA VEGA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LAGUNA SALADA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LAGUNA SALADA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE LAS MATAS DE FARFAN</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LAS MATAS DE FARFAN' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MAIMON</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MAIMON' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MAO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MAO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MELLA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MELLA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MOCA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MOCA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MONTE CRISTI</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MONTE CRISTI' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE MONTE PLATA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MONTE PLATA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE NAGUA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'NAGUA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE NAVARRETE</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'NAVARRETE' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE NEYBA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'NEYBA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PALO ALTO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PALO ALTO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PARTIDO</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PARTIDO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PIEDRA BLANCA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PIEDRA BLANCA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PIMENTEL</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PIMENTEL' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE PUERTO PLATA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PUERTO PLATA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE RIO SAN JUAN</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'RIO SAN JUAN' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SABANETA DE YASICA</span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SABANETA DE YASICA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SALCEDO </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SALCEDO ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAMANA </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAMANA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN CRISTOBAL </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN CRISTOBAL' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN FCO. DE MACORIS </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN FCO. DE MACORIS' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN JOSE DE OCOA </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN JOSE DE OCOA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN JUAN </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN JUAN' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SAN PEDRO DE MACORIS </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN PEDRO DE MACORIS' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SANCHEZ </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SANCHEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SANTIAGO </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SANTIAGO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SANTIAGO RODRIGUEZ </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SANTIAGO RODRIGUEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE SOSUA </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SOSUA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE TAMAYO </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'TAMAYO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE TENARES </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'TENARES' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VICENTE NOBLE </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VICENTE NOBLE' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VILLA ALTAGRACIA </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA ALTAGRACIA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VILLA GONZALEZ </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA GONZALEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VILLA TAPIA </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA TAPIA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE VILLA VAZQUEZ </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA VAZQUEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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
<p><span style="font-size: 20px; margin-left: 10px;">REPORTE DE YAMASA </span></p>
<p style="float: right; font-size: 20px;">Fecha: <?php  echo "$fecha"; ?></p>
<br>
              <table class="table table-bordered" >
                  <thead>
                    <tr>
                       <th>Servicio</th>
                      <th>Presinto-Servicio</th>
                        <th>Presinto-Externo</th> <th>Despacho</th>
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
  $sql = "SELECT servicio,presinto_servicio,presinto_externo,despacho_general,COUNT(cantidad) AS cantidad
,colectora,SUM(peso_real) AS peso_real, estafeta.destino,fecha_entrada
FROM
    narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division)
    INNER JOIN narisol_bladi.ruta 
        ON (estafeta.id_ruta = ruta.id_ruta)
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'YAMASA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '$fecha'
       GROUP BY destino,presinto_servicio,servicio,presinto_externo
ORDER BY customers.destino";
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