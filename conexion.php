<?php

$host = "localhost";
$usuario = 'bmejia';
$pass = '9Xkn7u!1';
$bdnombre = 'narisol_bladi';
mysqli_select_db("narisol_bladi");
$conn = mysqli_connect($host, $usuario, $pass,$bdnombre) or die ('Error conectando a la base de datos');



?>