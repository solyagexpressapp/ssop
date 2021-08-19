<?php
include '../conexion.php';
$date = date('Y-m-d');

$tracking = $_POST['tracking'];
$intento = $_POST['intento'];

$consulta = mysqli_query($conn,"SELECT COUNT(*) AS conteo FROM customers WHERE numero_envio = 'RB038577359IT'");
while ($row = mysqli_fetch_assoc($consulta)) {
	$cantidad = $row['conteo'];
}
if($cantidad > 0){
$query = "INSERT INTO intentos (tracking,intento,fecha_intento) VALUES ('$tracking','$intento','$date')";
$query_new_user_insert = mysqli_query($conn,$query);
echo "1";
}else{
echo '$tracking';	
}
?>