<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

$nombre=$_POST['nombre'];
$celular=$_POST['celular'];
$fecha = date('Y-m-d h:i:s A');
$imei =$_POST['imei'];
$zona =$_POST['zona'];
$monitor =$_POST['monitor'];



$sql="INSERT INTO distribucion (cartero ,celular, imei, zona, id_monitor, fecha_creacion) VALUES ('$nombre','$celular','$imei','$zona','$monitor','$fecha')";

$query_new_insert = mysqli_query($con,$sql);

?>