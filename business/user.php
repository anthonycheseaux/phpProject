<?php
/************************************************************\
 *
 * File			user.php
 *
 * Language		PHP
 *
 * Author		Anthony Cheseaux, Sylvain Tauxe
 * Creation		20160419
 *
 * Project		teemw
 * Package		include
 *
 * Description	common header
 *
 \************************************************************/
class User
{
public function __construct($id, $firstname, $lasname, $password, $title, $adress1, $adress2,
			$city, $role, $email, $society, $endDateShipper)
	{
		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lasname;
		$this->password = $password;
		$this->title = $title;
		$this->adress1 = $adress1;
		$this->adress2 = $adress2;
		$this->city = $city;
		$this->role = $role;
		$this->email = $email;
		$this->society = $society;
		$this->endDateShipper = $endDateShipper;
	}
	
	/**
	 * Returns the id
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * Sets the id
	 * @param $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getFirstname()
	{
		return $this->firstname;
	}
	
	public function setFirstname($firstname)
	{
		$this->fistname = $firstname;
	}
	
	public function getLastname()
	{
		return $this->lastname;
	}
	
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function getSociety()
	{
		return $this->society;
	}
	
	public function setSociety($society)
	{
		$this->society = $society;
	}
	
	public function getAddress1()
	{
		return $this->adress1;
	}
	
	public function setAddress1($adress1)
	{
		$this->adress1 = $adress1;
	}
	
	public function getAddress2()
	{
		return $this->adress2;
	}
	
	public function setAddress2($adress2)
	{
		$this->adress2 = $adress2;
	}
	
	public function getCity()
	{
		return $this->city;
	}
	
	public function setCity($city)
	{
		$this->city = $city;
	}
	
	public function getRole()
	{
		return $this->role;
	}
	
	public function setRole($role)
	{
		$this->role = $role;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function getEndDateShipper()
	{
		return $this->endDateShipper;
	}
	
	public function setEndDateShipper($endDateShipper)
	{
		$this->endDateShipper = $endDateShipper;
	}
	
	public function isInactive() {
		return $this->inactive;
	}
	
	public function setInactive($inactive) {
		$this->inactive = $inactive;
	}
	
	private $id;
	private $firstname;
	private $lastname;
	private $password;
	private $title;
	private $society;
	private $adress1;
	private $adress2;
	private $city;
	private $role;
	private $email;
	private $endDateShipper;
}
?>