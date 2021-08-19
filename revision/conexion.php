<?php
$host = 'ip-50-62-72-219.ip.secureserver.net';
$usuario = 'bmejia';
$pass = 'bmejia';

$con = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'narisol_bladi';
mysql_select_db("narisol_bladi");



?>