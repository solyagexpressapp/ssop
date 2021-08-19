<?php
include_once 'dbcon.php';
$id = $_POST['id'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$chk = $_POST['chk'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	$MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE destino='SANTIAGO' AND id=".$id[$i]);
}
header("Location: index.php");
?>