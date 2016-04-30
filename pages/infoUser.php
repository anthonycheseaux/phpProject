
<?php 

/************************************************************\
 *
 * File			infoUser.php
 *
 * Language		PHP
 *
 * Author		Sylvain Tauxe
 * Creation		20160418
 * modification 20160424
 *
 * Project		teemw
 *
 \************************************************************/
include_once '../ressources/templates/header.php';
require_once '../business/user.php';
?>
<?php

if(empty($_SESSION['user'])){
	header("../pages/register.php");
	exit();
}

if (isset($_SESSION['user'])){
	$user = unserialize($_SESSION['user']);
	
	//var_dump($user);
	echo $user->getTitle().'</br>';
	echo $user->getFirstname().'</br>';
	echo $user->getLastname().'</br>';
	echo $user->getAddress1().'  ';
	echo $user->getAddress2().'</br>';
	echo 'role : '.$user->getRole().'</br>';
	echo $user->getEmail().'</br>';
	
?>
<a href="../business/check_info_user.php?action=logout">Logout</a>
<?php 
}

?>

<?php include_once '../ressources/templates/footer.php';?>	

