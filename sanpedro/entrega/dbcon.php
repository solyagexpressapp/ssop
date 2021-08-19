<?php

	 $DB_host = "localhost";
	 $DB_user = "bmejia";
	 $DB_pass = "9Xkn7u!1";
	 $DB_name = "narisol_bladi";
	 
	 $MySQLiconn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($MySQLiconn->connect_errno)
     {
         die("ERROR : -> ".$MySQLiconn->connect_error);
     }

?>