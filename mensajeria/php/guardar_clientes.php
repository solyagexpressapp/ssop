<?php
  require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

$nombre=$_POST['nombre'];
$documento=$_POST['documento'];
$fecha = date('Y-m-d h:i:s A');
$empresa =$_POST['empresa'];
$direccion =$_POST['direccion'];
$correo =$_POST['correo'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$negocio = $_POST['negocio'];

 $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
 $password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
   for($i=0;$i<10;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
   }
   $passHash = password_hash($password, PASSWORD_BCRYPT);
   //Mostramos la contraseña generada
   //echo 'Password generado: '.$password;

$sql="INSERT INTO clientes (nombre ,rnc, empresa, direccion, celular, telefono, correo, tipo_negocio, fecha_creacion, contrasena, password) VALUES ('$nombre','$documento','$empresa','$direccion','$celular','$telefono','$correo','$negocio','$fecha','$password','$passHash')";

$query_new_insert = mysqli_query($con,$sql);


$query = mysqli_query($con,"INSERT INTO users (firstname ,user_name, lastname, user_email, nivel, date_added, user_password_hash) VALUES ('$nombre','$documento','$empresa','$correo','2','$fecha','$passHash')");

if(isset($_POST['correo'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "fernandohbd10@gmail.com";
$email_subject = "Informacion de Usuario de Mensajeria Expresa Inposdom";
$message = '<html><body>';
$email_message = "Detalles de Usuario:\n\n";
$email_message .= "Nombre Completo: " . $nombre. "\n";
$email_message .= "Telefono: " . $telefono. "\n";
$email_message .= "Fecha de Creacion: " . $fecha. "\n";
$email_message .= "Usuario: " .$documento. "\n";
$email_message .= "Contraseña: " .$password. "\n";

// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$correo."\r\n".
'Reply-To: '.$correo."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

}
?>
