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
WHERE  customers.destino = 'CENTRO DE LOS HEROES' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CENTRO DE LOS HEROES </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
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
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS JARDINES' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS JARDINES </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUALEY' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUALEY </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MEJORAMIENTO SOCIAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MEJORAMIENTO SOCIAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ZONA COLONIAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ZONA COLONIAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EMBAJADOR' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EMBAJADOR </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CRISTO REY' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CRISTO REY </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA FE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA FE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HUACAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HUACAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MULTICENTRO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MULTICENTRO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN MARTIN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN MARTIN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PLAZA CENTRAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PLAZA CENTRAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CIUDAD NUEVA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CIUDAD NUEVA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'UASD' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE UASD </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ENS. LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ENS. LUPERON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'AILA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE AILA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BOCA CHICA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BOCA CHICA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA DUARTE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA DUARTE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'OZAMA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE OZAMA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS MAMEYES' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS MAMEYES </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN ISIDRO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN ISIDRO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS MINAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS MINAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MEGACENTRO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MEGACENTRO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUERRA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUERRA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA VICTORIA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA VICTORIA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANA PERDIDA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANA PERDIDA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUARICANOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUARICANOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA MELLA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA MELLA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEDRO BRAND' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEDRO BRAND </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HAINA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HAINA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MANOGUAYABO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MANOGUAYABO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HERRERA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HERRERA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS ALCARRIZOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS ALCARRIZOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SANTIAGO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SANTIAGO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ZONA FRANCA SANTIAGO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ZONA FRANCA SANTIAGO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JANICO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JANICO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LICEY AL MEDIO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LICEY AL MEDIO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BAITOA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BAITOA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS CANELAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS CANELAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA GONZALEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA GONZALEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'NAVARRETE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE NAVARRETE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'TAMBORIL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE TAMBORIL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANA IGLESIA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANA IGLESIA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JARDINES METROPOLITANOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JARDINES METROPOLITANOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN JOSE DE LAS MATAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN JOSE DE LAS MATAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEDRO GARCIA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEDRO GARCIA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PUERTO PLATA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PUERTO PLATA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANETA DE YASICA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANETA DE YASICA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'YASICA ARRIBA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE YASICA ARRIBA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL ESTRECHO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL ESTRECHO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'IMBERT' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE IMBERT </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS HIDALGOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS HIDALGOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ESTEREO HONDO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ESTEREO HONDO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUALETE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUALETE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUANANICO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUANANICO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SOSUA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SOSUA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ALTAMIRA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ALTAMIRA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'AG-LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE AG-LUPERON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'AEROPUERTO LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE AEROPUERTO LUPERON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA ISABELA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA ISABELA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MONTELLANOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MONTELLANOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MOCA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MOCA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CAYETANO GERMOSEN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CAYETANO GERMOSEN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GASPAR HERNANDEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GASPAR HERNANDEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA VEGA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA VEGA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA TORRE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA TORRE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CONSTANZA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CONSTANZA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JARABACOA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JARABACOA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BONAO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BONAO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PIEDRA BLANCA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PIEDRA BLANCA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MAIMON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MAIMON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'NAGUA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE NAGUA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA ENTRADA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA ENTRADA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'RIO SAN JUAN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE RIO SAN JUAN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CABRERA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CABRERA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL FACTOR' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL FACTOR </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAMANA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAMANA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SANCHEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SANCHEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS TERRENAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS TERRENAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'COTUI' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE COTUI </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CEVICOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CEVICOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA MATA DE COTUI' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA MATA DE COTUI </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'FANTINO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE FANTINO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SALCEDO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SALCEDO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA TAPIA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA TAPIA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'TENARES' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE TENARES </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN FCO. DE MACORIS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN FCO. DE MACORIS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS GUARANAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS GUARANAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CASTILLO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CASTILLO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA RIVAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA RIVAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ARENOSO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ARENOSO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HOSTOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HOSTOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LIMON DEL YUMA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LIMON DEL YUMA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PIMENTEL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PIMENTEL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MONTE CRISTI' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MONTE CRISTI </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PALO VERDE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PALO VERDE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA ELISA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA ELISA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'COPEY' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE COPEY </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUAYUBIN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUAYUBIN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CASTANUELA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CASTANUELA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA MATA DE SANTA CRUZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA MATA DE SANTA CRUZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA SINDA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA SINDA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEPILLO SALCEDO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEPILLO SALCEDO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA VAZQUEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA VAZQUEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'DAJABON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE DAJABON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOMA DE CABRERA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOMA DE CABRERA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PARTIDO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PARTIDO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'RESTAURACION' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE RESTAURACION </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL PINO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL PINO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SANTIAGO RODRIGUEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SANTIAGO RODRIGUEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA LOS ALMASIGOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA LOS ALMASIGOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MONCION' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MONCION </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MAO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MAO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ESPERANZA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ESPERANZA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAGUNA SALADA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAGUNA SALADA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN CRISTOBAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN CRISTOBAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA ALTAGRACIA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA ALTAGRACIA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'YAGUATE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE YAGUATE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PALENQUE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PALENQUE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS CACAOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS CACAOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CAMBITA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CAMBITA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'AZUA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE AZUA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PADRE LAS CASAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PADRE LAS CASAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS YAYAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS YAYAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUAYABAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUAYABAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS CHARCAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS CHARCAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ESTEBANIA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ESTEBANIA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BARAHONA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BARAHONA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CABRAL' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CABRAL </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'POLO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE POLO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS SALINAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS SALINAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VICENTE NOBLE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VICENTE NOBLE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'FUNDACION' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE FUNDACION </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ENRIQUILLO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ENRIQUILLO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BANI' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BANI </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANA BUEY' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANA BUEY </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'NIZAO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE NIZAO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN JOSE DE OCOA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN JOSE DE OCOA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'NEYBA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE NEYBA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LOS RIOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LOS RIOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA JARAGUA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA JARAGUA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GALVAN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GALVAN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'TAMAYO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE TAMAYO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JIMANI' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JIMANI </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'POSTER RIO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE POSTER RIO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA DESCUBIERTA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA DESCUBIERTA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'DUVERGE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE DUVERGE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN JUAN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN JUAN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VALLEJUELO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VALLEJUELO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL CERCADO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL CERCADO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JUAN DE HERRERA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JUAN DE HERRERA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BOHECHIO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BOHECHIO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'COMENDADOR' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE COMENDADOR </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HONDO VALLE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HONDO VALLE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEDRO SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEDRO SANTANA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BANICA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BANICA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL LLANO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL LLANO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEDERNALES' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEDERNALES </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'OVIEDO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE OVIEDO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HATO MAYOR' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HATO MAYOR </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANA DE LA MAR' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANA DE LA MAR </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL VALLE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL VALLE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LA ROMANA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LA ROMANA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'GUAYMATE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE GUAYMATE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'HIGUEY' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE HIGUEY </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BAVARO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BAVARO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN RAFAEL DEL YUMA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN RAFAEL DEL YUMA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'NISIBON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE NISIBON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL SEYBO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL SEYBO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEDRO SANCHEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEDRO SANCHEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MICHES' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MICHES </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MONTE PLATA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MONTE PLATA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANA GRANDE DE BOYA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANA GRANDE DE BOYA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'YAMASA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE YAMASA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BAYAGUANA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BAYAGUANA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN PEDRO DE MACORIS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN PEDRO DE MACORIS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JUAN DOLIO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JUAN DOLIO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ING QUISQUEYA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ING QUISQUEYA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PERALTA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PERALTA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS MATAS DE FARFAN' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS MATAS DE FARFAN </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ELIAS PINA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ELIAS PINA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL CERCADO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL CERCADO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PEDRO SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PEDRO SANTANA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PALO ALTO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PALO ALTO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PARAISO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PARAISO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'MELLA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE MELLA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'JOSE CONTRERAS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE JOSE CONTRERAS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'ING CONSUELO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE ING CONSUELO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN JOSE DE LOS LLANOS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN JOSE DE LOS LLANOS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'RAMON SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE RAMON SANTANA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BOCA DE YUMA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BOCA DE YUMA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'NISIBON' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE NISIBON </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'PERALVILLO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE PERALVILLO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'VILLA HERMOSA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE VILLA HERMOSA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANA YEGUA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANA YEGUA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SABANETA STO. RODRIGUEZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SABANETA STO. RODRIGUEZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'EL MAMEY' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE EL MAMEY </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SANTO SERRO LA VEGA' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SANTO SERRO LA VEGA </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'RIO VERDE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE RIO VERDE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'LAS MATAS DE SANTA CRUZ' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE LAS MATAS DE SANTA CRUZ </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'CONSUELO' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE CONSUELO </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'SAN LUIS' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE SAN LUIS </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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
WHERE  customers.destino = 'BAYAHIBE' AND fecha_entrada = '$fecha' AND servicio = 'ORDINARIO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<center><h2>ORDINARIO</h2></center>";
echo "<center><h2>REPORTE DE BAYAHIBE </h2></center>";
echo "<table class='table table-bordered' >";  
echo "<thead>";
echo "<tr>";
echo "<th >Fecha</th>";
echo "<th>Codigo</th>";
echo "<th>Nombre</th>";
echo "<th>Destino</th>";
echo "<th>Despacho</th>";
echo "<th>Precinto</th>";
echo "<th>Peso</th>";
echo "</tr>";
echo "</thead>";
}
while($row = mysql_fetch_array($sql)){

echo "<tbody>";
echo '<tr>';
echo '<td>'. $row['fecha_entrada'] .'</td>';
echo '<td>'.$row["numero_envio"].'</td>';
echo '<td>'. $row['destinatario'] .'</td>';
echo '<td>'. $row['destino'] .'</td>';
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