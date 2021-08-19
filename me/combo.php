<?php
session_start();

if(isset($_SESSION['nombre'])) {

?>
<html> 
<head>
<title>INSTITUTO POSTAL DOMINICANO</title>
</head>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body> 
<script type="text/javascript">
function redireccionarPagina() {
  window.location = "reporte_destino.php";
}
setTimeout("redireccionarPagina()", 90000);

</script>

<script type="text/javascript">window.print();</script>
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
<?php
$fecha= isset($_GET['fecha']) ? $_GET['fecha'] : null ;
$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
?>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CENTRO DE LOS HEROES' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CENTRO DE LOS HEROES </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Monitores</th>";
echo "<th>Oficiales</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['monitores'] .'</td>';
echo '<td>'. $row['oficiales'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>

<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS JARDINES' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS JARDINES </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUALEY' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUALEY </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MEJORAMIENTO SOCIAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MEJORAMIENTO SOCIAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ZONA COLONIAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ZONA COLONIAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EMBAJADOR' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EMBAJADOR </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CRISTO REY' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CRISTO REY </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA FE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA FE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HUACAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HUACAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MULTICENTRO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MULTICENTRO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN MARTIN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN MARTIN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PLAZA CENTRAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PLAZA CENTRAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CIUDAD NUEVA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CIUDAD NUEVA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'UASD' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE UASD </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ENS. LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ENS. LUPERON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'AILA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AILA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BOCA CHICA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BOCA CHICA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA DUARTE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA DUARTE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'OZAMA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE OZAMA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS MAMEYES' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS MAMEYES </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN ISIDRO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN ISIDRO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS MINAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS MINAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MEGACENTRO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MEGACENTRO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUERRA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUERRA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA VICTORIA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA VICTORIA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANA PERDIDA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA PERDIDA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUARICANOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUARICANOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA MELLA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA MELLA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEDRO BRAND' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO BRAND </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HAINA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HAINA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MANOGUAYABO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MANOGUAYABO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HERRERA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HERRERA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS ALCARRIZOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS ALCARRIZOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SANTIAGO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANTIAGO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ZONA FRANCA SANTIAGO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ZONA FRANCA SANTIAGO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JANICO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JANICO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LICEY AL MEDIO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LICEY AL MEDIO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BAITOA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAITOA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS CANELAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS CANELAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA GONZALEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA GONZALEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'NAVARRETE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NAVARRETE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'TAMBORIL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE TAMBORIL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANA IGLESIA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA IGLESIA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JARDINES METROPOLITANOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JARDINES METROPOLITANOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN JOSE DE LAS MATAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JOSE DE LAS MATAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEDRO GARCIA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO GARCIA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PUERTO PLATA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PUERTO PLATA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANETA DE YASICA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANETA DE YASICA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'YASICA ARRIBA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE YASICA ARRIBA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL ESTRECHO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL ESTRECHO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'IMBERT' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE IMBERT </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS HIDALGOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS HIDALGOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ESTEREO HONDO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ESTEREO HONDO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUALETE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUALETE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUANANICO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUANANICO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SOSUA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SOSUA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ALTAMIRA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ALTAMIRA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'AG-LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AG-LUPERON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'AEROPUERTO LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AEROPUERTO LUPERON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA ISABELA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA ISABELA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MONTELLANOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONTELLANOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MOCA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MOCA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CAYETANO GERMOSEN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CAYETANO GERMOSEN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GASPAR HERNANDEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GASPAR HERNANDEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA VEGA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA VEGA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA TORRE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA TORRE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CONSTANZA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CONSTANZA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JARABACOA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JARABACOA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BONAO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BONAO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PIEDRA BLANCA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PIEDRA BLANCA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MAIMON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MAIMON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'NAGUA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NAGUA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA ENTRADA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA ENTRADA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'RIO SAN JUAN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RIO SAN JUAN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CABRERA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CABRERA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL FACTOR' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL FACTOR </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAMANA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAMANA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SANCHEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANCHEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS TERRENAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS TERRENAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'COTUI' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE COTUI </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CEVICOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CEVICOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA MATA DE COTUI' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA MATA DE COTUI </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'FANTINO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE FANTINO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SALCEDO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SALCEDO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA TAPIA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA TAPIA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'TENARES' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE TENARES </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN FCO. DE MACORIS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN FCO. DE MACORIS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS GUARANAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS GUARANAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CASTILLO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CASTILLO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA RIVAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA RIVAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ARENOSO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ARENOSO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HOSTOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HOSTOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LIMON DEL YUMA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LIMON DEL YUMA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PIMENTEL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PIMENTEL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MONTE CRISTI' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONTE CRISTI </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PALO VERDE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PALO VERDE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA ELISA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA ELISA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'COPEY' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE COPEY </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUAYUBIN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUAYUBIN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CASTANUELA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CASTANUELA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA MATA DE SANTA CRUZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA MATA DE SANTA CRUZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA SINDA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA SINDA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEPILLO SALCEDO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEPILLO SALCEDO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA VAZQUEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA VAZQUEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'DAJABON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE DAJABON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOMA DE CABRERA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOMA DE CABRERA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PARTIDO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PARTIDO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'RESTAURACION' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RESTAURACION </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL PINO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL PINO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SANTIAGO RODRIGUEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANTIAGO RODRIGUEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA LOS ALMASIGOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA LOS ALMASIGOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MONCION' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONCION </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MAO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MAO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ESPERANZA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ESPERANZA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAGUNA SALADA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAGUNA SALADA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN CRISTOBAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN CRISTOBAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA ALTAGRACIA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA ALTAGRACIA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'YAGUATE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE YAGUATE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PALENQUE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PALENQUE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS CACAOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS CACAOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CAMBITA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CAMBITA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'AZUA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AZUA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PADRE LAS CASAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PADRE LAS CASAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS YAYAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS YAYAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUAYABAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUAYABAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS CHARCAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS CHARCAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ESTEBANIA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ESTEBANIA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BARAHONA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BARAHONA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CABRAL' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CABRAL </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'POLO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE POLO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS SALINAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS SALINAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VICENTE NOBLE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VICENTE NOBLE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'FUNDACION' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE FUNDACION </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ENRIQUILLO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ENRIQUILLO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BANI' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BANI </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANA BUEY' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA BUEY </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'NIZAO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NIZAO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN JOSE DE OCOA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JOSE DE OCOA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'NEYBA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NEYBA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LOS RIOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS RIOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA JARAGUA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA JARAGUA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GALVAN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GALVAN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'TAMAYO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE TAMAYO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JIMANI' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JIMANI </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'POSTER RIO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE POSTER RIO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA DESCUBIERTA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA DESCUBIERTA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'DUVERGE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE DUVERGE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN JUAN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JUAN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VALLEJUELO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VALLEJUELO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL CERCADO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL CERCADO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JUAN DE HERRERA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JUAN DE HERRERA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BOHECHIO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BOHECHIO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'COMENDADOR' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE COMENDADOR </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HONDO VALLE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HONDO VALLE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEDRO SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO SANTANA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BANICA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BANICA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL LLANO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL LLANO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEDERNALES' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDERNALES </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'OVIEDO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE OVIEDO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HATO MAYOR' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HATO MAYOR </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANA DE LA MAR' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA DE LA MAR </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL VALLE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL VALLE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LA ROMANA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA ROMANA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'GUAYMATE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUAYMATE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'HIGUEY' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HIGUEY </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BAVARO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAVARO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN RAFAEL DEL YUMA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN RAFAEL DEL YUMA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'NISIBON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NISIBON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL SEYBO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL SEYBO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEDRO SANCHEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO SANCHEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MICHES' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MICHES </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MONTE PLATA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONTE PLATA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANA GRANDE DE BOYA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA GRANDE DE BOYA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'YAMASA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE YAMASA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BAYAGUANA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAYAGUANA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN PEDRO DE MACORIS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN PEDRO DE MACORIS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JUAN DOLIO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JUAN DOLIO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ING QUISQUEYA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ING QUISQUEYA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PERALTA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PERALTA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS MATAS DE FARFAN' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS MATAS DE FARFAN </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ELIAS PINA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ELIAS PINA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL CERCADO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL CERCADO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PEDRO SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO SANTANA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PALO ALTO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PALO ALTO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PARAISO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PARAISO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'MELLA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MELLA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'JOSE CONTRERAS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JOSE CONTRERAS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'ING CONSUELO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ING CONSUELO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN JOSE DE LOS LLANOS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JOSE DE LOS LLANOS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'RAMON SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RAMON SANTANA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BOCA DE YUMA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BOCA DE YUMA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'NISIBON' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NISIBON </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'PERALVILLO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PERALVILLO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'VILLA HERMOSA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA HERMOSA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANA YEGUA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA YEGUA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SABANETA STO. RODRIGUEZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANETA STO. RODRIGUEZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'EL MAMEY' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL MAMEY </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SANTO SERRO LA VEGA' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANTO SERRO LA VEGA </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'RIO VERDE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RIO VERDE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'LAS MATAS DE SANTA CRUZ' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS MATAS DE SANTA CRUZ </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'CONSUELO' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CONSUELO </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'SAN LUIS' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN LUIS </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="page-break"></div>
<?php
$sql = mysql_query("SELECT presinto_servicio,despacho_servicio,numero_envio,peso_real, estafeta.destino AS destino,fecha_entrada,pais_origen,destinatario,monitores,descripcion,oficiales
FROM narisol_bladi.customers
    INNER JOIN narisol_bladi.estafeta 
        ON (customers.destino = estafeta.destino)
    INNER JOIN narisol_bladi.region 
        ON (estafeta.ID_REGION = region.ID_REGION)
    INNER JOIN narisol_bladi.division_regional 
        ON (region.Id_division = division_regional.id_division) 
WHERE  customers.destino = 'BAYAHIBE' AND fecha_entrada = '$fecha' AND servicio = 'MENSAJERIA EXPRESA'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>MENSAJERIA EXPRESA</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAYAHIBE </span></p>";
echo "<p style='float: right; font-size: 20px;'>Fecha: ".$fecha."</p>";
echo "<br>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['despacho_servicio'] .'</td>';
echo '<td>'. $row['presinto_servicio'] .'</td>';
echo '<td>'. $row['peso_real'] .'</td>';
echo '</tr>';
echo '</tbody>';
}
echo '</table>';
?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->



</body>
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>