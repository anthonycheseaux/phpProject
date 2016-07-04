<?php
/************************************************************\
 *
 * File			user.php
 *
 * Language		PHP
 *
 * Author		Sylvain Tauxe
 * Creation		20160702
 *
 * Project		teemw
 * Package		include
 *
 * Description	common header
 *
 \************************************************************/
class City {
	public function __construct($id, $cityName, $cityPostcode, $cityState, $country) {
		$this->id = $id;
		$this->name = $cityName;
		$this->postcode = $cityPostcode;
		$this->state = $cityState;
		$this->country = $country;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getCityName()
	{
		return $this->name;
	}
	
	public function getPostcode()
	{
		return $this->postcode;
	}
	
	public function getState()
	{
		return $this->state;
	}
	
	public function getCountry()
	{
		return $this->country;
	}
	
	
	private $id;
	private $name;
	private $postcode;
	private $state;
	private $country;
}
?>