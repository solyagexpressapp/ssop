<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body><?php
include 'conexion.php';
			if(isset($_POST['login'])){

				$usuario = $_POST['nombre'];
				$pw = $_POST['pass'];

	$log = mysql_query("SELECT * FROM contabilidad WHERE nombre='$usuario' AND pass='$pw' AND servicio='GUARICANOS' ");
				if (mysql_num_rows($log)>0) {
					$row = mysql_fetch_array($log);

					$_SESSION["nombre"] = $row['nombre']; 

				  	/*echo 'Iniciando sesión para '.$_SESSION['nombre'].' <p>';*/
					echo '<script> window.location="guaricano.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="index.php"; </script>';
				}
			}
		?>
<style type="text/css">

	#contenedor{
       width: 970px;
       height: 500px;
       /*background-color: red;*/
       margin: 0 auto;

	}
	
</style>
<div id="contenedor">
<img style="display:block;margin:0 auto 0 auto;margin-top:400px;" src="../images/cargandoPaginaWeb.gif" alt="descripción" />
</div>		
</body>
</html>