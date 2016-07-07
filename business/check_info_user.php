
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
require_once '../tools/database/mysqlcitymanager.php';
require_once '../tools/database/mysqlestimatemanager.php';
require_once '../ressources/config.php';

 
if (! isset ( $_SESSION )) {
	session_start ();
}
$mysql = new MySqlManager();
$mysqlCity = new MySqlCityManager();
$mysqlEstimate = new MySqlEstimateManager();
const WAIT_TO_READ_ACCEPT = 2;
const WAIT_TO_READ_REFUSED = 5;
const ESTIMATE_PAID = 4;

if(isset($_POST['action'])){
	//Create account	
	if($_POST['action']=='Créer'){
		if(isset($_POST['society'])){
			
			registerShipper($mysql, $mysqlCity);
		}
		else {
			registerCustomer($mysql, $mysqlCity);
		}
		
	}
	
	//Authentication
	if($_POST['action']==_LOGIN){
		
		authenticateShipper($mysql, $mysqlCity, $mysqlEstimate);
	}
	
	if($_POST['action']==_LOGIN){
		authenticateShipper($mysql, $mysqlCity);
	}
	
	if($_POST['action']==_CHANGE_INFO_USER){
		updateInfoUser($mysql, $mysqlCity);
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
function authenticateShipper($mysql, $mysqlCity, $mysqlEstimate){
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$result = $mysql->checkLoginShipper($email, $pwd);
	if(!$result){
		$_SESSION['from_data'] = array($email, $pwd);
		$_SESSION['msg'] = _MSG_MAIL_PASSWORD_INCORRECT; //'Email or password incorrect';
		$_SESSION['rank'] = -1;
		header("location: ../pages/home.php");
		exit();
	}
	
	/*$_SESSION['msg'] = 'Welcome '. $result->getFirstname.' '.$result->getLastname;
	$_SESSION['rank'] = 1;*/
	
	$resultCity = $mysqlCity->getCityById($result->getCity());
	$_SESSION['user'] = serialize($result);
	$_SESSION['city'] = serialize($resultCity);
	if($result->getRole()==3){
		
		/*$estimatesAccept = $mysqlEstimate->getAllEstimatesByShipper($result->getId(), WAIT_TO_READ_ACCEPT );
		$estimatesRefused = $mysqlEstimate->getAllEstimatesByShipper($result->getId(), WAIT_TO_READ_REFUSED );*/
		
		$estimatesAccept = $mysqlEstimate->getAllEstimatesByShipperWithTitleAd($result->getId(), WAIT_TO_READ_ACCEPT );
		$estimatesRefused = $mysqlEstimate->getAllEstimatesByShipperWithTitleAd($result->getId(), WAIT_TO_READ_REFUSED );

		if ($estimatesAccept != null){
			$_SESSION['estimate_accepted'] = $estimatesAccept;
		}
		
		if ($estimatesRefused != null){
			$_SESSION['estimate_refused'] = $estimatesRefused;
		}
		
				
		$customer = $mysqlEstimate->getAdByEstimateState($result->getId(), ESTIMATE_PAID);
		
		if($customer!=null){
		
			$_SESSION['infoCustomer'] = $customer;
		}
		
	}
	
	if($result->getRole()==2){
		
		$customer = $mysqlEstimate->getAdByEstimateState($result->getId(), ESTIMATE_PAID);
	
		if($customer!=null){
	
			$_SESSION['infoCustomer'] = $customer;
		}
	
	}
	
	
	header("location: ../pages/infoUser.php");
	exit();
}
//Login Customer
function authenticateCustomer($mysql, $mysqlCity){
	$email = htmlspecialchars($_POST['email']);
	$pwd = htmlspecialchars($_POST['pwd']);
	$result = $mysql->checkLoginCustomer($email, $pwd);
	if(!$result){
		$_SESSION['from_data'] = array($email, $pwd);
		$_SESSION['msg'] = _MSG_MAIL_PASSWORD_INCORRECT; //'Email or password incorrect';
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
function registerShipper($mysql, $mysqlCity){
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
	
	
	//Search the city in database
	$cityResult = $mysqlCity->searchCityByName($postCode, $cityName);
	//Check wich field is empty and get a message error
	
	if($cityResult==false){
		$rank = 21;
		$msg = _MSG_CITY ;//"This city does not exist";
	}
	
	if(empty($society)){
		$rank = 11;
		$msg = _MSG_SETSOCT; //"Set a society";
	}
	
	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)==0){
		$rank = 10;
		$msg = _MSG_ERROR_EMAIL; //"Email structure is not correct";
	}
	
	if(empty($email)){
		$rank = 10;
		$msg = _MSG_SETMAIL; //"Set an email";
	}
	
	if(empty($country)){
		$rank = 9;
		$msg = _MSG_SETCOUNTRY; //"Set a country";
	}
	
	if(empty($postCode)){
		$rank = 8;
		$msg = _MSG_SETPOSTCODE; //"Set a post code";
	}
	if(empty($cityName)){
		$rank = 7;
		$msg = _MSG_SETCITY; //"Set a city";
	}
	
	if(empty($adress1)){
		$rank = 6;
		$msg = _MSG_SETADDRESS; //"Set an adress";
	}
	if(empty($title)){
		$rank = 5;
		$msg = _MSG_SETTITLE; //"Set a title";
	}
	
	if(empty($pwd)){
		$rank = 4;
		$msg = _MSG_SETPASSWORD; //"Set a password";
	}
		
	if(empty($lname)){
		$rank = 2;
		$msg = _MSG_SETLNAME; //"Set a lastname";
	}
	
	if(empty($fname)){
		$rank = 1;
		$msg = _MSG_SETFNAME; //"Set a firstname";
	}
	
	if(isset($rank)){
		$_SESSION['rank'] = $rank;
		$_SESSION['msg'] = $msg;
		$_SESSION['form_data'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country, $email, $society); //To auto complete the fields no empty
		header("location: ../pages/home.php");
		exit();
	}
	$idCity = $cityResult->getId();
	
	$result = $mysql->saveShipper($fname, $lname, $pwd, $title, $adress1, $adress2, $idCity, $role, $email, $society);
	//$result = $mysql->saveShipper($fname, $lname, $pwd, $title, $adress1, $adress2, 1, $role, $email, $society);
	
	//If username already exist
	if($result == 'doublon'){
		$_SESSION['rank'] = 10;
		$_SESSION['msg'] = _MSG_EMAIL_USED; //'Email already used';
		$_SESSION['form_data'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country,  $email, $society);
	}
	else{
		$_SESSION['rank'] = 'shipper_ok';
		$_SESSION['msg'] = _MSG_REGISTRATION_SUCCESS; //'Registration succeeded';
	}
	
	header("location: ../pages/home.php");
	exit;
}
//Create new customer account
function registerCustomer($mysql, $mysqlCity){
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
	
	//Search the city in database
	$cityResult = $mysqlCity->searchCityByName($postCode, $cityName);
	//Check wich field is empty and get a message error
	
	
	if($cityResult==false){
		$rank = 22;
		$msg = _MSG_CITY;
	}
	
	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)==0){
		$rank = 20;
		$msg = _MSG_ERROR_EMAIL; // "Email structure is not correct";
	}
	
	if(empty($email)){
		$rank = 20;
		$msg = _MSG_SETMAIL; // "Set an email";
	}
	
	if(empty($country)){
		$rank = 19;
		$msg = _MSG_SETCOUNTRY; // "Set a country";
	}
	
	if(empty($postCode)){
		$rank = 18;
		$msg = _MSG_SETPOSTCODE; // "Set a post code";
	}
	if(empty($cityName)){
		$rank = 17;
		$msg = _MSG_SETCITY; // "Set a city";
	}
	if(empty($adress1)){
		$rank = 16;
		$msg = _MSG_SETADDRESS; // "Set an adress";
	}
	if(empty($title)){
		$rank = 15;
		$msg = _MSG_SETTITLE; // "Set a title";
	}
	if(empty($pwd)){
		$rank =14;
		$msg = _MSG_SETPASSWORD; // "Set a password";
	}
	if(empty($lname)){
		$rank =13;
		$msg = _MSG_SETLNAME; // "Set a last name";
	}
	if(empty($fname)){
		$rank = 12;
		$msg = _MSG_SETFNAME; // "Set a first name";
	}
	
	if(isset($rank)){
		$_SESSION['rank'] = $rank;
		$_SESSION['msg'] = $msg;
		$_SESSION['form_data_user'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country, $email); //To auto complete the fields no empty
		header("location: ../pages/home.php");
		exit();	
	}
	$idCity = $cityResult->getId();
	$result = $mysql->saveCustomer($fname, $lname, $pwd, $title, $adress1, $adress2, $idCity, $role, $email);
	//$result = $mysql->saveCustomer($fname, $lname, $pwd, $title, $adress1, $adress2, 1, $role, $email);
	//If username already exist
	if($result == 'doublon'){
		$_SESSION['rank'] = 20;
		$_SESSION['msg'] = _MSG_EMAIL_USED; // 'Email already used';
		$_SESSION['form_data'] = array($fname, $lname, $pwd, $title, $adress1, $adress2, $postCode, $cityName,  $country, $email);
	}
	else{
		$_SESSION['rank'] = 'customer_ok';
		$_SESSION['msg'] = _MSG_REGISTRATION_SUCCESS; //'Registration succeeded';
	}
	header("location: ../pages/home.php");
	exit;
}
//02.05.2016
function updateInfoUser($mysql, $mysqlCity){
	$password = htmlspecialchars($_POST['updatePassword']);
	$adress1 = htmlspecialchars($_POST['updateAdress1']);
	$adress2 = htmlspecialchars($_POST['updateAdress2']);
	//$postCode = htmlspecialchars($_POST['updatePostcode']);
	$city = htmlspecialchars($_POST['updateCity']);
	$user = unserialize($_SESSION['user']);
	$society = $user->getSociety();
	if(isset($_POST['updateSociety'])){
		$society = htmlspecialchars($_POST['updateSociety']);
	}
	//$resultCity;
	//$newCityId = $user->getCity();
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
	echo '*'.$city.' ' . $user->getId();
	/*if(empty($society)){
		$society = $user->getSociety();
	}*/
	$result = $mysql->updateUser($user->getId(), $adress1, $adress2, $city, $password, $society);
	$_SESSION['rank']=30;
	$_SESSION['msg']= _MSG_UPDATE_SUCCESS; //'Update succeeded, please logout and login again to apply update';
	header("location: ../pages/infoUser.php");
	exit();
}


?>