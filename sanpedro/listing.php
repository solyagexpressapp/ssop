<?php
session_start();

if(isset($_SESSION['nombre'])) {

?>
<html> 
<head>
  <title>INSTITUTO POSTAL DOMINICANO</title>
</head>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
require_once('conexion.php');
$destino2 = $_POST['destino2'];
$fecha2 = $_POST['fecha2'];
$calidad = $_POST['calidad'];
$date = date('Y-m-d');

$sql="UPDATE customers SET condicion_general= 2 ,fecha_entrega = '$date',porque = NULL , motivo = NULL , calidad = '$calidad'
WHERE DATE_FORMAT(fecha_entrada,'%Y/%m/%d') <> DATE_FORMAT(SYSDATE(),'%Y/%m/%d') AND fecha_entrada = '$fecha2' AND destino = 'SAN PEDRO DE MACORIS' ";
$result= mysql_query($sql) or die(mysql_error());


if (!$sql)
    {
	echo('Hubo un Error ejecutando este Query - 2');
	echo "MySQL dice: ".mysql_error();
}
echo("<meta http-equiv=\"refresh\" content=\"0; url=sanpedro.php\"/>");

?>

</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>


