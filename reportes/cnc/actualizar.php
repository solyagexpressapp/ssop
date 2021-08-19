<?php
$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
$date = date('Y-m-d');

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {

mysql_query("UPDATE customers SET condicion_general='2',fecha_entrega = '$date',porque = NULL , motivo = NULL  WHERE presinto_servicio='" . $_POST["users"][$i] . "'");

}
header("Location:cnc.php");
?>