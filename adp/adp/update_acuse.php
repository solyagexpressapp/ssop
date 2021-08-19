<?php

session_start();
require_once('conexion.php');
if(isset($_SESSION['nombre'])) {
?>
<?php

$pepe = $_SESSION['nombre'];

$sql="UPDATE customers set impresion = 2 where servicio = 'CERTIFICADO'";
$result= mysql_query($sql) or die(mysql_error());


if (!$sql)
    {
	echo('Hubo un Error ejecutando este Query - 2');
	echo "MySQL dice: ".mysql_error();
}
echo("<meta http-equiv=\"refresh\" content=\"0; url=acuse.php\"/>");

?>
<!DOCTYPE html>
<html>

<head>
	<title>INSTITUTO POSTAL DOMINICANO</title>
</head>
<body>
<style type="text/css">

	#contenedor{
       width: 970px;
       height: 500px;
       /*background-color: red;*/
       margin: 0 auto;

	}
	
</style>
<div id="contenedor">
<img style="display:block;margin:0 auto 0 auto;margin-top:400px;" src="cargandoPaginaWeb.gif" alt="descripción" />
</div>
</body>
</html>
<?php
}else{
  echo '<script> window.location="index.php"; </script>';
}
?>