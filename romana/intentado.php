<?php
include 'conexion.php';
$date = date('Y-m-d');

$tracking = $_POST['tracking'];
$intento = $_POST['intento'];

$consulta = mysql_query("SELECT COUNT(*) AS conteo FROM customers WHERE numero_envio = '$tracking'");
while ($row = mysql_fetch_assoc($consulta)) {
	$cantidad = $row['conteo'];
}
if($cantidad > 0){
$query = mysql_query("INSERT INTO intentos (tracking,intento,fecha_intento) VALUES ('$tracking','$intento','$date')");
echo "1";
}else{
echo "2";	
}
?>