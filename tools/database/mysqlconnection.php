<?php
/************************************************************\
 *
 * File			mysqlconnection.php
 *
 * Language		PHP
 *
 * Author		Anthony Cheseaux, Sylvain Tauxe
 * Creation		20160418
 * modification 20160423
 *
 * Project		teemw
 *
 \************************************************************/


class MySqlConnection
{
	const HOST = "127.0.0.1";
	const port = "3306";
	const database = "grp1";
	const user = "grp1";
	const pwd = "Finlande2018";
	
	private $_connection;
	
	public function __construct(){
		try {
			$this->_connection = new PDO('mysql:host='.self::HOST.
											'; port='.self::port.
											'; dbname='.self::database, self::user, self::pwd, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
		}
		catch (PDOException $e) {
			die ('Connection failed: '. $e->getMessage());
		}
	}
	
	public function getConnection(){
		
		if(!isset($this->_connection)||$this->_connection==null){
			new MySqlConn();
			
		}
		return $this->_connection;
	}
	
	public function selectDB($query){
		$result= $this->getConnection()->query($query)
		or die (print_r($this->getConnection()->errorInfo(), true));
		
		return $result;
	}
	
	public function executeQuery($query)
	{
		
		$result =$this->getConnection()->exec($query);
		$e = $this->getConnection()->errorInfo();
		var_dump($query);
		
		if($e[1]!=null){
			if($e[1] == 1062) //test if username already exist
				return 'doublon';
				else
					die(print_r($this->getConnection()->errorInfo(), true));
		}
		

		return $result;
	}
}

?>