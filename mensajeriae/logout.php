<?php
session_start();
session_destroy();
//echo 'Cerraste sesión';
echo '<script> window.location="index.php"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saliendo...</title>
	<meta charset="utf-8">
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
<img style="display:block;margin:0 auto 0 auto;margin-top:400px;" src="images/cargandoPaginaWeb.gif" alt="descripción" />
</div>

<script language="javascript">location.href ="index.php";</script>
</body>
</html>