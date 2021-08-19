<?php
require_once('../conexion.php');
$id = isset($_GET['id']) ? $_GET['id'] : null ;

$sql="DELETE FROM customers WHERE id = '$id'";
$result= mysql_query($sql) or die(mysql_error());

if (!$sql)
    {
	echo('Hubo un Error ejecutando este Query - 2');
	echo "MySQL dice: ".mysql_error();
}
echo("<meta http-equiv=\"refresh\" content=\"0; url=entrega.php\"/>");

}else{
  echo '<script> window.location="index.php"; </script>';
}
?>