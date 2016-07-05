<?php

/************************************************************\
 *
* File			mysqlmanager.php
*
* Language		PHP
*
* Author		Sylvain Tauxe
* Creation		20160702
* modification 20160702
*
* Project		teemw
*
\************************************************************/


require_once 'mysqlconnection.php';
require_once '../business/city.php';
class MySqlCityManager
{
	private $_conn;

	public function __construct()
	{
		$this->_conn=new MySqlConnection();
	}


	public function searchCityByName ($postCode, $cityName){
			
		$query = "SELECT * FROM city WHERE city_name = '$cityName' AND city_postcode='$postCode'";
		$result = $this->_conn->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
	
		return new City($row['city_id'], $row['city_name'], $row['city_postcode'], $row['city_state'], $row['city_country']);
	}
	
	
	public function getCityById ($id){
	
		$query = "SELECT * FROM city WHERE city_id = '$id'";
		$result = $this->_conn->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
	
		return new City($row['city_id'], $row['city_name'], $row['city_postcode'], $row['city_state'], $row['city_country']);
	}
	
	public function getAllCities(){
		$query = "SELECT * FROM city";
		$result = $this->_conn->selectDB($query);
		while ($row = $result->fetch()) {
			$city = new City($row['city_id'], $row['city_name'], $row['city_postcode'], $row['city_state'], $row['city_country']);
			$response[] = $city;
			unset($city);
		}
		
		return $response;
	}
}
