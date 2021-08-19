<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
  
$id=$_GET['id'];

$sql="DELETE FROM clientes WHERE id_cliente = '$id'";

$query_new_insert = mysqli_query($con,$sql);

?>