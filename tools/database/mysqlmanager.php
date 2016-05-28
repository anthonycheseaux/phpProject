<?php
/************************************************************\
 *
 * File			mysqlmanager.php
 *
 * Language		PHP
 *
 * Author		Sylvain Tauxe
 * Creation		20160417
 * modification 20160509
 *
 * Project		teemw
 *
 \************************************************************/


require_once 'mysqlconnection.php';
require_once '../business/user.php';
class MySqlManager
{
	private $_conn;

	public function __construct()
	{
		$this->_conn=new MySqlConnection();
	}

	public function checkLoginCustommer ($email, $pwd){
		$pwd = sha1($pwd);

		$query = "SELECT * FROM user WHERE user_email = '$email' AND user_password='$pwd'";
		$result = $this->_conn->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;

		return new User($row['user_id'], $row['user_firstname'], $row['user_lastname'], $row['user_password'], $row['user_title'],
				$row['user_adress1'], $row['user_adress2'], $row['user_city'], $row['user_role'], $row['user_email']);
	}
	
	public function getUser($id){
	
		$query = "SELECT * FROM user WHERE user_id = '$id'";
		$result = $this->_conn->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
	
		return new User($row['user_id'], $row['user_firstname'], $row['user_lastname'], $row['user_password'], $row['user_title'],
				$row['user_adress1'], $row['user_adress2'], $row['user_city'], $row['user_role'], $row['user_email'], $row['user_society'], $row['shipper_subscription_end']);
	}

	public function checkLoginShipper ($email, $pwd){
		$pwd = sha1($pwd);
		
		$query = "SELECT * FROM user WHERE user_email = '$email' AND user_password='$pwd'";
		$result = $this->_conn->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;

		return new User($row['user_id'], $row['user_firstname'], $row['user_lastname'], $row['user_password'], $row['user_title'],
				$row['user_adress1'], $row['user_adress2'], $row['user_city'], $row['user_role'], $row['user_email'],
				$row['user_society'], $row['shipper_subscription_end']);
	}

	
	public function saveCustomer ($fname, $lname, $pwd, $title, $adr1, $adr2, $city, $role, $email){
		$pwd = sha1($pwd);
		$query = "INSERT into user (user_firstname, user_lastname, user_password, user_title,
		user_adress1, user_adress2, user_city, user_role, user_email)
		VALUES ('$fname', '$lname', '$pwd', '$title', '$adr1', '$adr2', '$city', '$role', '$email');";
		
		return $this->_conn->executeQuery($query);
	}
	
	public function saveShipper ($fname, $lname, $pwd, $title, $adr1, $adr2, $city, $role, $email, $society){

		$pwd = sha1($pwd);
		$query = "INSERT INTO user (user_firstname, user_lastname, user_password, user_title,
		user_adress1, user_adress2, user_city, user_role, user_email, user_society)
		VALUES ('$fname', '$lname', '$pwd', '$title', '$adr1', '$adr2', '$city', '$role', '$email', '$society');";
		return $this->_conn->executeQuery($query);
	}
	

	public function updateUser($id, $adress1, $adress2, $password, $society){
	
		$query = "UPDATE user SET user_society = '$society', user_adress1 = '$adress1', user_adress2 = '$adress2', user_password = '$password' WHERE  user_id ='$id' ;";
		return $this->_conn->executeQuery($query);
	
	}
	

}
