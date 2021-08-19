<?php
$conn = mysql_connect("ip-50-62-72-219.ip.secureserver.net","bmejia","bmejia");
mysql_select_db("narisol_bladi",$conn);
$date = date('Y-m-d');

$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {

mysql_query("DELETE FROM customers WHERE  id='" . $_POST["users"][$i] . "'");

}
header("Location:entrega.php");
?>