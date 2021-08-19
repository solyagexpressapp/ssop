<?php
include 'conexion.php';
$date = date('Y-m-d');

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {

mysql_query("UPDATE customers SET condicion_general=2,fecha_entrega = '$date',porque = NULL , motivo = NULL 
 WHERE destino IN ('SABANA PERDIDA') 
 AND DATE_FORMAT(fecha_entrada,'%Y/%m/%d') <> DATE_FORMAT(SYSDATE(),'%Y/%m/%d') AND presinto_servicio IS NULL OR presinto_servicio='" . $_POST["users"][$i] . "'");

}
header("Location:sperdida.php");
?>