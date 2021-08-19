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
</style>
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_provincial.php";
}
setTimeout("redireccionarPagina()", 8000);

</script>
<script type="text/javascript">window.print();</script>
<?php
$fecha= isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'ALTAMIRA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<div class="page-break"></div>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'AZUA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>

<div class="page-break"></div>
<center><h2>Reporte de BANI</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BANI' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de BARAHONA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BARAHONA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de BAVARO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BAVARO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de BAYAGUANA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BAYAGUANA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de BONAO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'BONAO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de CABRAL</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'CABRAL' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de CASTILLO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'CASTILLO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
                 <div class="page-break"></div>
<center><h2>Reporte de COTUI</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'COTUI' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de DAJABON</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'DAJABON' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de DUVERGE</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'DUVERGE' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de EL SEYBO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'EL SEYBO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de ELIAS PINA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'ELIAS PINA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de ESPERANZA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'ESPERANZA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de GASPAR HERNANDEZ</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'GASPAR HERNANDEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de HATO MAYOR</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'HATO MAYOR' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de HIGUEY</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'HIGUEY' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de IMBERT</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'IMBERT' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de JUAN DOLIO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'JUAN DOLIO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de LA ROMANA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LA ROMANA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de LA VEGA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LA VEGA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de LAGUNA SALADA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LAGUNA SALADA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de LAS MATAS DE FARFAN</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'LAS MATAS DE FARFAN' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de MAIMON</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MAIMON' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de MAO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MAO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de MELLA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MELLA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de MOCA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MOCA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de MONTE CRISTI</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MONTE CRISTI' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de MONTE PLATA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'MONTE PLATA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de NAGUA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'NAGUA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de NAVARRETE</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'NAVARRETE' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de NEYBA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'NEYBA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de PALO ALTO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PALO ALTO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de PARTIDO</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PARTIDO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de PIEDRA BLANCA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PIEDRA BLANCA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de PIMENTEL</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PIMENTEL' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de PUERTO PLATA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'PUERTO PLATA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de RIO SAN JUAN</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'RIO SAN JUAN' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SABANETA DE YASICA</h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SABANETA DE YASICA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SALCEDO </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SALCEDO ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SAMANA </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAMANA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SAN CRISTOBAL </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN CRISTOBAL' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SAN FCO. DE MACORIS </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN FCO. DE MACORIS' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SAN JOSE DE OCOA </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN JOSE DE OCOA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SAN JUAN </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN JUAN' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SAN PEDRO DE MACORIS </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SAN PEDRO DE MACORIS' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SANCHEZ </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SANCHEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SANTIAGO </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SANTIAGO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SANTIAGO RODRIGUEZ </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SANTIAGO RODRIGUEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de SOSUA </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'SOSUA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de TAMAYO </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'TAMAYO' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de TENARES </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'TENARES' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de VICENTE NOBLE </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VICENTE NOBLE' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de VILLA ALTAGRACIA </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA ALTAGRACIA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de VILLA GONZALEZ </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA GONZALEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de VILLA TAPIA </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA TAPIA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de VILLA VAZQUEZ </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'VILLA VAZQUEZ' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
              <div class="page-break"></div>
<center><h2>Reporte de YAMASA </h2></center>
              <?php
$sql = mysql_query("SELECT servicio,presinto_servicio,despacho_general,COUNT(cantidad) AS cantidad
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
       WHERE CONDICION_GENERAL = 1 AND ruta.punto_ruta = 'YAMASA' AND servicio <> 'COLIS POSTAL' AND fecha_entrada = '2017-02-02'
       GROUP BY destino,presinto_servicio,servicio
ORDER BY customers.destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>DESPACHO GENERAL</h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Servicio</th>";
echo "<th>Presinto</th>";
echo "<th>Despacho</th>";
echo "<th>Cantidad</th>";
echo "<th>Colectora</th>";
echo "<th>Peso</th>";
echo "<th>Destino</th>";
echo "<th>Fecha</th>";
echo "</tr>";
echo "</thead>";
}

while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['servicio'] . '</td>';
echo '<td>'. $row['presinto_servicio'] . '</td>';
echo '<td>'. $row['despacho_general'] . '</td>';
echo '<td>'. $row['cantidad'] . '</td>';
echo '<td>'. $row['colectora'] . '</td>';
echo '<td>'. $row['peso_real'] . '</td>';
echo '<td>'. $row['destino'] . '</td>';
echo '<td>'. $row['fecha_entrada'] . '</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>           
</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>