<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

$nombre_empresa=$_POST['nombre_empresa'];
$numero_orden=$_POST['numero_orden'];
$fecha = date('Y-m-d h:i:s A');
$cantidad =$_POST['cantidad'];
$fecha_despacho =$_POST['fecha_despacho'];
$fecha_limite =$_POST['fecha_limite'];


$sql="INSERT INTO ordenes (empresa ,orden, cantidad, fecha_despacho, fecha_entrega, fecha_creacion) VALUES ('$nombre_empresa','$numero_orden','$cantidad','$fecha_despacho','$fecha_limite','$fecha')";

$query_new_insert = mysqli_query($con,$sql);



?>