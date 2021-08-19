<?php

$host = 'localhost';
$usuario = 'bmejia';
$pass = '9Xkn7u!1';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'narisol_bladi';
mysql_select_db("narisol_bladi");

?>