<?php

  include('dao/MysqlDao.php');
  class MysqlFactory extends AbstractDaoFactory
  {
  	   
  	    public static  $con;
  	     private static $host="localhost";
        private static $dbuserName="username";
        private static $dbuserPass="password";

  	public static function getConnection()
  	{
  		try {
  		 $con1 = mysql_connect(self::$host,self::$dbuserName,self::$dbuserPass);
  		 self::$con=$con1;
  	       if (!$con1)
              {
        die('Could not connect: ' . mysql_error());
              }
         return $con1;
  		}
  	catch (Exception $e) {
           error_log("connect to db  error".$e->getMessage(),0);
  		
        }
  	}
  	
  
  	
  	public static function selectDatabase($dbname)
  	{
  	  try{
  	   mysql_select_db($dbname,self::$con);
  	  }
  	catch (Exception $e) {
           error_log("selecting db error".$e->getMessage(),0);
  		
        }
  		
  	}
  	
  	public static function closeConnection()
  	{
  		 mysql_close(self::$con);	
  	}
  	
  	
  	
  	public static function getMysqlDao()
  	{
  		try{
  		return new MysqlDao;
  		}
  	catch (Exception $e) {
           error_log("error generating dao object".$e->getMessage(),0);
  		
        }
  	}
  	
  	
  
  	
  
  }



?>
