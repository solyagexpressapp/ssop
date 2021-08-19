<?php

	 $DB_host = "ip-50-62-72-219.ip.secureserver.net";
	 $DB_user = "bmejia";
	 $DB_pass = "bmejia";
	 $DB_name = "narisol_bladi";
	 
	 $MySQLiconn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($MySQLiconn->connect_errno)
     {
         die("ERROR : -> ".$MySQLiconn->connect_error);
     }

?>