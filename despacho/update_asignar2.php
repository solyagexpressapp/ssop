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
$destino1 = isset($_GET['destino1']) ? $_GET['destino1'] : null ;
$colectora = isset($_GET['colectora']) ? $_GET['colectora'] : null ;

$sql="UPDATE customers set  colectora ='$colectora' WHERE destino = '$destino1'
AND DATE_FORMAT(fecha_entrada,'%Y/%m/%d') = DATE_FORMAT(SYSDATE(),'%Y/%m/%d') AND servicio <> 'COLIS POSTAL'";
$result= mysql_query($sql) or die(mysql_error());


if (!$sql)
    {
	echo('Hubo un Error ejecutando este Query - 2');
	echo "MySQL dice: ".mysql_error();
}
echo("<meta http-equiv=\"refresh\" content=\"0; url=asignar_estafetas.php\"/>");

?>

</body> 
</html>
<?php
}else{
  echo '<script> window.location="../index.php"; </script>';
}
?>


