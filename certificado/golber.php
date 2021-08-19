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
$conn = mysql_connect("localhost","bmejia","9Xkn7u!1");
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
WHERE  customers.destino = 'CENTRO DE LOS HEROES' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CENTRO DE LOS HEROES <span style='color: red;'>".$destino1."</span></span></p>";
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
echo '<td>'. $row['numero_envio'] .'</td>';
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
WHERE  customers.destino = 'LOS JARDINES' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS JARDINES <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUALEY' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUALEY <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MEJORAMIENTO SOCIAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MEJORAMIENTO SOCIAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ZONA COLONIAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ZONA COLONIAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EMBAJADOR' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EMBAJADOR <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CRISTO REY' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CRISTO REY <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA FE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA FE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HUACAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HUACAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MULTICENTRO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MULTICENTRO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN MARTIN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN MARTIN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PLAZA CENTRAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PLAZA CENTRAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CIUDAD NUEVA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CIUDAD NUEVA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'UASD' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE UASD <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ENS. LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ENS. LUPERON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'AILA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AILA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BOCA CHICA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BOCA CHICA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA DUARTE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA DUARTE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'OZAMA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE OZAMA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOS MAMEYES' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS MAMEYES <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN ISIDRO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN ISIDRO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOS MINAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS MINAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MEGACENTRO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MEGACENTRO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUERRA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUERRA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA VICTORIA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA VICTORIA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANA PERDIDA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA PERDIDA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUARICANOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUARICANOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA MELLA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA MELLA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEDRO BRAND' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO BRAND <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HAINA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HAINA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MANOGUAYABO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MANOGUAYABO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HERRERA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HERRERA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOS ALCARRIZOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS ALCARRIZOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SANTIAGO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANTIAGO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ZONA FRANCA SANTIAGO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ZONA FRANCA SANTIAGO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JANICO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JANICO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LICEY AL MEDIO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LICEY AL MEDIO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BAITOA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAITOA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS CANELAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS CANELAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA GONZALEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA GONZALEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'NAVARRETE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NAVARRETE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'TAMBORIL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE TAMBORIL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANA IGLESIA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA IGLESIA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JARDINES METROPOLITANOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JARDINES METROPOLITANOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN JOSE DE LAS MATAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JOSE DE LAS MATAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEDRO GARCIA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO GARCIA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PUERTO PLATA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PUERTO PLATA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANETA DE YASICA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANETA DE YASICA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'YASICA ARRIBA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE YASICA ARRIBA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL ESTRECHO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL ESTRECHO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'IMBERT' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE IMBERT <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOS HIDALGOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS HIDALGOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ESTEREO HONDO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ESTEREO HONDO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUALETE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUALETE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUANANICO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUANANICO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SOSUA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SOSUA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ALTAMIRA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ALTAMIRA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'AG-LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AG-LUPERON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'AEROPUERTO LUPERON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AEROPUERTO LUPERON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA ISABELA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA ISABELA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MONTELLANOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONTELLANOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MOCA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MOCA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CAYETANO GERMOSEN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CAYETANO GERMOSEN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GASPAR HERNANDEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GASPAR HERNANDEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA VEGA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA VEGA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA TORRE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA TORRE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CONSTANZA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CONSTANZA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JARABACOA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JARABACOA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BONAO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BONAO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PIEDRA BLANCA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PIEDRA BLANCA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MAIMON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MAIMON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'NAGUA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NAGUA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA ENTRADA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA ENTRADA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'RIO SAN JUAN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RIO SAN JUAN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CABRERA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CABRERA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL FACTOR' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL FACTOR <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAMANA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAMANA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SANCHEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANCHEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS TERRENAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS TERRENAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'COTUI' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE COTUI <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CEVICOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CEVICOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA MATA DE COTUI' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA MATA DE COTUI <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'FANTINO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE FANTINO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SALCEDO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SALCEDO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA TAPIA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA TAPIA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'TENARES' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE TENARES <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN FCO. DE MACORIS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN FCO. DE MACORIS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS GUARANAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS GUARANAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CASTILLO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CASTILLO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA RIVAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA RIVAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ARENOSO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ARENOSO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HOSTOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HOSTOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LIMON DEL YUMA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LIMON DEL YUMA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PIMENTEL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PIMENTEL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MONTE CRISTI' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONTE CRISTI <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PALO VERDE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PALO VERDE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA ELISA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA ELISA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'COPEY' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE COPEY <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUAYUBIN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUAYUBIN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CASTANUELA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CASTANUELA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA MATA DE SANTA CRUZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA MATA DE SANTA CRUZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA SINDA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA SINDA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEPILLO SALCEDO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEPILLO SALCEDO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA VAZQUEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA VAZQUEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'DAJABON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE DAJABON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOMA DE CABRERA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOMA DE CABRERA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PARTIDO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PARTIDO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'RESTAURACION' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RESTAURACION <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL PINO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL PINO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SANTIAGO RODRIGUEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANTIAGO RODRIGUEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA LOS ALMASIGOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA LOS ALMASIGOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MONCION' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONCION <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MAO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MAO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ESPERANZA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ESPERANZA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAGUNA SALADA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAGUNA SALADA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN CRISTOBAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN CRISTOBAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA ALTAGRACIA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA ALTAGRACIA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'YAGUATE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE YAGUATE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PALENQUE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PALENQUE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOS CACAOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS CACAOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CAMBITA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CAMBITA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'AZUA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE AZUA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PADRE LAS CASAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PADRE LAS CASAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS YAYAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS YAYAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUAYABAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUAYABAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS CHARCAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS CHARCAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ESTEBANIA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ESTEBANIA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BARAHONA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BARAHONA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CABRAL' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CABRAL <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'POLO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE POLO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS SALINAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS SALINAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VICENTE NOBLE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VICENTE NOBLE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'FUNDACION' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE FUNDACION <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ENRIQUILLO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ENRIQUILLO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BANI' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BANI <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANA BUEY' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA BUEY <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'NIZAO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NIZAO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN JOSE DE OCOA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JOSE DE OCOA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'NEYBA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NEYBA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LOS RIOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LOS RIOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA JARAGUA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA JARAGUA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GALVAN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GALVAN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'TAMAYO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE TAMAYO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JIMANI' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JIMANI <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'POSTER RIO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE POSTER RIO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA DESCUBIERTA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA DESCUBIERTA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'DUVERGE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE DUVERGE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN JUAN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JUAN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VALLEJUELO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VALLEJUELO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL CERCADO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL CERCADO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JUAN DE HERRERA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JUAN DE HERRERA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BOHECHIO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BOHECHIO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'COMENDADOR' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE COMENDADOR <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HONDO VALLE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HONDO VALLE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEDRO SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO SANTANA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BANICA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BANICA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL LLANO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL LLANO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEDERNALES' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDERNALES <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'OVIEDO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE OVIEDO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HATO MAYOR' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HATO MAYOR <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANA DE LA MAR' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA DE LA MAR <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL VALLE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL VALLE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LA ROMANA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LA ROMANA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'GUAYMATE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE GUAYMATE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'HIGUEY' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE HIGUEY <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BAVARO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAVARO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN RAFAEL DEL YUMA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN RAFAEL DEL YUMA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'NISIBON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NISIBON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL SEYBO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL SEYBO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEDRO SANCHEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO SANCHEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MICHES' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MICHES <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MONTE PLATA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MONTE PLATA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANA GRANDE DE BOYA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA GRANDE DE BOYA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'YAMASA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE YAMASA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BAYAGUANA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAYAGUANA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN PEDRO DE MACORIS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN PEDRO DE MACORIS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JUAN DOLIO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JUAN DOLIO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ING QUISQUEYA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ING QUISQUEYA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PERALTA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PERALTA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS MATAS DE FARFAN' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS MATAS DE FARFAN <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ELIAS PINA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ELIAS PINA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL CERCADO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL CERCADO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PEDRO SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PEDRO SANTANA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PALO ALTO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PALO ALTO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PARAISO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PARAISO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'MELLA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE MELLA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'JOSE CONTRERAS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE JOSE CONTRERAS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'ING CONSUELO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE ING CONSUELO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN JOSE DE LOS LLANOS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN JOSE DE LOS LLANOS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'RAMON SANTANA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RAMON SANTANA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BOCA DE YUMA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BOCA DE YUMA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'NISIBON' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE NISIBON <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'PERALVILLO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE PERALVILLO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'VILLA HERMOSA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE VILLA HERMOSA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANA YEGUA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANA YEGUA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SABANETA STO. RODRIGUEZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SABANETA STO. RODRIGUEZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'EL MAMEY' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE EL MAMEY <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SANTO SERRO LA VEGA' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SANTO SERRO LA VEGA <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'RIO VERDE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE RIO VERDE <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'LAS MATAS DE SANTA CRUZ' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE LAS MATAS DE SANTA CRUZ <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'CONSUELO' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE CONSUELO <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'SAN LUIS' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE SAN LUIS <span style='color: red;'>".$destino1."</span></span></p>";
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
WHERE  customers.destino = 'BAYAHIBE' AND fecha_entrada = '$fecha' AND servicio = 'CERTIFICADO'   
ORDER BY destino");
if(mysql_num_rows($sql)==0){
echo "";
}else{
echo "<img style='float: left' width='100px' height='150px'  src='img/inposdom.gif'>";
echo "<p><span class='inposdom'>INSTITUTO POSTAL DOMINICANO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>DIRECCION DE OPERACIONES</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>CORREO CERTIFICADO</span></p>";
echo "<p><span style='font-size: 20px; margin-left: 10px;'>REPORTE DE BAYAHIBE <span style='color: red;'>".$destino1."</span></span></p>";
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