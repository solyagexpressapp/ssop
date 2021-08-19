<?php
class Database 
{
	private static $dbName = 'adp' ; 
	private static $dbHost = 'ip-50-62-72-219.ip.secureserver.net' ;
	private static $dbUsername = 'bmejia';
	private static $dbUserPassword = 'bmejia';

	
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	   // One connection through whole application
       if ( null == self::$cont )
       {      
        try 
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
          	mysql_query("SET NAMES 'utf8'");
        
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
	}

	public static function disconnect()
	{
		self::$cont = null;
	}
	
}
?>