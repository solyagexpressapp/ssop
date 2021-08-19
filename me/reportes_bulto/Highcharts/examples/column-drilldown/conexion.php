<?php

$host = 'localhost';
$usuario = 'root';
$pass = '';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'datos_inspodom';
mysql_select_db("datos_inspodom");
