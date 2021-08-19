<?php

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
 $password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
   for($i=0;$i<10;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
   }
   //Mostramos la contraseña generada
   $passHash = password_hash($password, PASSWORD_BCRYPT);
   echo 'Password generado: '.$password;
   echo "<br><br>";
   echo "Password Generada con Hash: ".$passHash;
   
?>