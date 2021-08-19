<?php

$servername = "localhost";
$username = "bmejia";
$password = "bmejia";
$db ="narisol_bladi";

 $con=@mysqli_connect($servername, $username, $password, $db);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }


?>