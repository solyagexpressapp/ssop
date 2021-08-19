<?php
include '../conexion.php';
$date = date('Y-m-d');

$tracking = $_POST['tracking'];
$despacho = $_POST['despacho'];
$presinto = $_POST['precinto'];
$motivo = $_POST['motivo'];

$consulta = mysqli_query($conn,"SELECT COUNT(*) AS conteo FROM customers WHERE numero_envio = '$tracking'");
while ($row = mysqli_fetch_array ($consulta)) {
 $cantidad = $row['conteo'];

}
if($cantidad > 0){
$query = mysqli_query($conn,"UPDATE customers SET condicion_general = 7 , despacho_general = '$despacho' , presinto_servicio = '$presinto', motivo = '$motivo',fecha_devolucion = '$date'
WHERE numero_envio = '$tracking';");
$sql = mysqli_query($conn,"INSERT INTO devoluciones (tracking,fecha_devolucion,motivo) VALUES ('$tracking','$date','$motivo');");
 echo "1";
}else{
echo "2";	
}
?>