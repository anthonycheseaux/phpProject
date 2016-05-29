
<?php

/************************************************************\
 *
 * File			check_info_user.php
 *
 * Language		PHP
 *
 * Author		Sylvain Tauxe
 * Creation		20160418
 * modification 20160509
 *
 * Project		teemw
 * Package		include
 *
 * Description	common header
 *
 \************************************************************/

require_once '../tools/database/mysqlmanager.php';
session_start();
$mysql = new MySqlManager();

echo "pass1";
if(isset($_POST['action'])){
	echo "pass2";
	//Create account	
	if($_POST['action']=='Créer'){
		if(isset($_POST['society'])){
			echo "pass3";
			registerShipper($mysql);
		}
		else {
			registerCustomer($mysql);
		}

		
	}
	
	//Authentication
	if($_POST['action']=='Login'){
		
		authenticateShipper($mysql);
	}
	
	if($_POST['action']=='Login'){
		authenticateShipper($mysql);
	}
	
	if($_POST['action']=='Update your info'){
		updateInfoUser($mysql);
	}

}
if(isset($_GET['action'])){
	
	if($_GET['action']=='logout'){
			
		logout();
	}
}

function logout(){
	
	session_destroy();
	header("location: ../pages/home.php");
	exit;
}

//Login Shipper
function authenticateShipper($mysql){

	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$result = $mysql->checkLoginShipper($email, $pwd);
	if(!$result){
		$_SESSION['from_data'] = array($email, $pwd);
		$_SESSION['msg'] = 'Email or password incorrect';
		$_SESSION['rank'] = -1;
		header("location: ../pages/home.php");
		exit();
	}
	
	/*$_SESSION['msg'] = 'Welcome '. $result->getFirstname.' '.$result->getLastname;
	$_SESSION['rank'] = 1;*/

	$_SESSION['user'] = serialize($result);

	header("location: ../pages/infoUser.php");
	exit();
}


//Login Customer
function authenticateCustomer($mysql){
	$email = htmlspecialchars($_POST['email']);
	$pwd = htmlspecialchars($_POST['pwd']);
	$result = $mysql->checkLoginCustomer($email, $pwd);
	if(!$result){
		$_SESSION['from_data'] = array($email, $pwd);
		$_SESSION['msg'] = 'Email or password incorrect';
		$_SESSION['rank'] = -1;
		header("location: ../pages/home.php");
		exit;
	}

	/*$_SESSION['msg'] = 'Welcome '. $result->firstname.' '.$result->lastname;
	$_SESSION['rank'] = 1;*/
	$_SESSION['user'] = serialize($result);

	header("location: pages/infoUser.php");
	exit;
}

//Create new shipper account
function registerShipper($mysql){
	$fname =htmlspecialchars($_POST['firstname']);
	$lname = htmlspecialchars($_POST['lastname']);
	$pwd = htmlspecialchars($_POST['password']);
	$title = htmlspecialchars($_POST['title']);
	$adress1 = htmlspecialchars($_POST['adress1']);
	$adress2 = htmlspecialchars($_POST['adress2']);
	$cityName = htmlspecialchars($_POST['cityName']);
	$postCode = htmlspecialchars($_POST['postCode']);
	$country = htmlspecialchars($_POST['country']);
	$role = 3;
	$email = htmlspecialchars($_POST['email']);
	$society = htmlspecialchars($_POST['society']);
	$date = new DateTime();
	
	//Check wich field is empty and get a message error
	
	if(empty($society)){
		$rank = 11;
		$msg = "Set a society";
	}
	
	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)==0){
		$rank = 10;
		$msg = "Email structure is not correct";
	}
	
	if(empty($email)){
		$rank = 10;
		$msg = "Set an email";
	}
	
	if(empty($country)){
		$rank = 9;
		$msg = "Set a country";
	}
	
	if(empty($postCode)){
		$rank = 8;
		$msg = "Set a post code";
	}

	if(empty($cityName)){
		$rank = 7;
		$msg = "Set a city";
	}
	
	if(empty($adress1)){
		$rank = 6;
		$msg = "Set an adress";
	}
	if(empty($title)){
		$rank = 5;
		$msg = "Set a title";
	}
	
	if(empty($pwd)){
		$rank = 4;
		$msg = "Set a password";
	}
		
	if(empty($lname)){
		$rank = 2;
		$msg = "Set a last name";
	}
	
	if(empty($fname)){
		$rank = 1;
		$msg = "Set a first name";
	}
	
	if(isset($rank)){
		$_SESSION['rank'] = $rank;
		$_SESSION['msg'] = $msg;
		$_SESSION['form_data'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country, $email, $society); //To auto complete the fields no empty

		header("location: ../pages/home.php");

		exit();
	}

	$result = $mysql->saveShipper($fname, $lname, $pwd, $title, $adress1, $adress2, 1, $role, $email, $society);
	
	//If username already exist
	if($result == 'doublon'){
		$_SESSION['rank'] = 10;
		$_SESSION['msg'] = 'Email already used';
		$_SESSION['form_data'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country,  $email, $society);
	}
	else{
		$_SESSION['rank'] = 'shipper_ok';
		$_SESSION['msg'] = 'Registration succeeded';
	}
	
	header("location: ../pages/home.php");
	exit;
}


//Create new customer account
function registerCustomer($mysql){
	$fname = htmlspecialchars($_POST['firstname']);
	$lname = htmlspecialchars($_POST['lastname']);
	
	$pwd = htmlspecialchars($_POST['password']);
	$title = htmlspecialchars($_POST['title']);
	$adress1 = htmlspecialchars($_POST['adress1']);
	$adress2 = htmlspecialchars($_POST['adress2']);
	$cityName = htmlspecialchars($_POST['cityName']);
	$postCode = htmlspecialchars($_POST['postCode']);
	$country = htmlspecialchars($_POST['country']);
	$role = 2;
	$email = htmlspecialchars($_POST['email']);
	

	//Check wich field is empty and get a message error

	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)==0){
		$rank = 20;
		$msg = "Email structure is not correct";
	}
	

	if(empty($email)){
		$rank = 20;
		$msg = "Set an email";
	}
	
	if(empty($country)){
		$rank = 19;
		$msg = "Set a country";
	}
	
	if(empty($postCode)){
		$rank = 18;
		$msg = "Set a post code";
	}

	if(empty($cityName)){
		$rank = 17;
		$msg = "Set a city";
	}

	if(empty($adress1)){
		$rank = 16;
		$msg = "Set an adress";
	}
	if(empty($title)){
		$rank = 15;
		$msg = "Set a title";
	}

	if(empty($pwd)){
		$rank =14;
		$msg = "Set a password";
	}

	if(empty($lname)){
		$rank =13;
		$msg = "Set a last name";
	}

	if(empty($fname)){
		$rank = 12;
		$msg = "Set a first name";
	}
	

	if(isset($rank)){
		$_SESSION['rank'] = $rank;
		$_SESSION['msg'] = $msg;
		$_SESSION['form_data_user'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country, $email); //To auto complete the fields no empty

		header("location: ../pages/home.php");
		exit();	
	}

	$result = $mysql->saveCustomer($fname, $lname, $pwd, $title, $adress1, $adress2, 1, $role, $email);

	//If username already exist
	if($result == 'doublon'){
		$_SESSION['rank'] = 20;
		$_SESSION['msg'] = 'Email already used';
		$_SESSION['form_data'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country, $email);
	}
	else{
		$_SESSION['rank'] = 'customer_ok';
		$_SESSION['msg'] = 'Registration succeeded';
	}

	header("location: ../pages/home.php");
	exit;
}

//02.05.2016
function updateInfoUser($mysql){
	$password = htmlspecialchars($_POST['updatePassword']);
	$adress1 = htmlspecialchars($_POST['updateAdress1']);
	$adress2 = htmlspecialchars($_POST['updateAdress2']);
	$society = htmlspecialchars($_POST['updateSociety']);
	$user = unserialize($_SESSION['user']);

	if(empty($password)){
		$password = $user->getPassword();
	}
	else {
		$password = sha1($password);
	}

	if(empty($adress1)){
		$adress1 = $user->getAddress1();
	}

	if(empty($adress2)){
		$adress2 = $user->getAddress2();
	}

	if(empty($society)){
		$society = $user->getSociety();
	}

	$result = $mysql->updateUser($user->getId(), $adress1, $adress2, $password, $society);

	$_SESSION['rank']=30;
	$_SESSION['msg']= 'Update succeeded, please logout and login again to apply update';

	header("location: ../pages/infoUser.php");
	exit();

}
?>