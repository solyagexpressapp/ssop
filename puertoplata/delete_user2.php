<?php
include 'conexion.php';
$date = date('Y-m-d');

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {

mysql_query("DELETE FROM customers WHERE destino = 'PUERTO PLATA' AND   id='" . $_POST["users"][$i] . "'");

}
header("Location:entrega.php");
?>