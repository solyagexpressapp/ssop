<?php

$host = 'ip-50-62-72-219.ip.secureserver.net';
$usuario = 'bmejia';
$pass = 'bmejia';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'adp';
mysql_select_db("adp");
mysql_query("SET NAMES 'utf8'");

?>