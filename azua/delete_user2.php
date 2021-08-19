<?php
include 'conexion.php';
$date = date('Y-m-d');

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {

mysql_query("DELETE FROM customers WHERE destino = 'AZUA' AND   id='" . $_POST["users"][$i] . "'");

}
header("Location:entrega.php");
?>