<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" rev="stylesheet" href="css/login.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Seguimiento de Paqueteria Postal</title>
<script src="js/jquery-1.2.6.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script type="text/javascript">
document.oncontextmenu = function(){return false;}
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#login_form input:first").focus();
});
</script>
</head>

<body>
<h2>Seguimiento de Paqueteria Postal</h2>

<div id="container">

	<div id="top">
	Iniciar Sesión
	</div>
	<div id="login_form">
		<div id="welcome_message">
		Ingrese su Usario y Password
		</div>
		<form action="entrada.php" method="post">
		<div class="form_field_label">Usuario :</div>
		<div class="form_field">
		<input type="text" name="nombre">
		</div>

		<div class="form_field_label">Contraseña :</div>
		<div class="form_field">
	    <input type="password" name="pass">
		</div>
		
		<div id="submit_button">
		<input type="submit" name="login" value="Login">
		</div>
		</form>
	</div>
</div>
<br/>
<form>                           
<input type="button" class="btn btn-info" value="Volver" name="volver" onclick="history.back()" />
</form>
</body>
</html>

