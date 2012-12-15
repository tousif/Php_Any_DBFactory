<?php
   
     include_once("daoFactory/MysqlFactory.php");   
     require_once("interfaces/BaseDao.php");
     
     
     class MysqlDao implements BaseDao
     {
     	
     	private $connection;
       	
     	
     	
     	//create connection 
        function createConnection()
        {
        	$connection=MysqlFactory::getConnection();
        }     	
        
        
        //select database
        function selectDatabase()
        {
        	MysqlFactory::selectDatabase("dbname",$this->connection);
        }
        
        
       
     	
     	
     	
     	
     	// close connection to database
     	function closeConnection()
     	{
     		MysqlFactory::closeConnection();
     	}
     	
     	
     	
     	
     	
     }


?>
