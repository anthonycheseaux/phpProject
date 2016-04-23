<?php
class User
{
	public $id;
	public $firstname;
	public $lastname;
	public $password;
	public $title;
	public $society;
	public $adress1;
	public $adress2;
	public $city;
	public $role;
	public $email;
	public $endDateShipper;
	
	public function __construct($id, $firstname, $lasname, $password, $title, $adress1, $adress2,
			$city, $role, $email, $society, $endDateShipper)
	{
		$this->id=$id;
		$this->firstname=$firstname;
		$this->lastname=$lasname;
		$this->password=$password;
		$this->title=$title;
		$this->adress1=$adress1;
		$this->adress2=$adress2;
		$this->city=$city;
		$this->role = $role;
		$this->email = $email;
		$this->society=$society;
		$this->endDateShipper=$endDateShipper;
	
	}
}
?>