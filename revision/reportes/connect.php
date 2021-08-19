<?php

$host = '50.62.72.219';
$usuario = 'bmejia';
$pass = 'bmejia';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'juno';
mysql_select_db("juno");

?>