<?php
/************************************************************\
 *
 * File			mysqladmanager.php
 *
 * Language		PHP
 *
 * Author		David Mack
 * Creation		20160516
 * modification
 *
 * Project		teemw
 *
 \************************************************************/
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '\..\..');
require_once ('../../ressources/config.php');
require_once (LIBRARY_PATH . "/templateFunctions.php");
require_once 'tools/database/mysqlconnection.php';
require_once 'tools/database/mysqladmanager.php';
require_once '../../business/user.php';
$mysql = new MySqlAdManager();

// constantes correspondant aux noms de champs
define("_ID", "id");
define("_CATEGORY", "category");
define("_DEPARTURE_CITY", "departure_city");
define("_DESTINATION_CITY", "destination_city");
define("_TITLE", "title");
define("_DESCRIPTION", "description");
define("_TOTAL_WEIGHT", "total_weight");
define("_OBJECTS_NUM", "objects_num");
define("_TOTAL_VOLUME", "total_volume");
define("_DATE_BEGINNING", "date_beginning");
define("_DATE_END", "date_end");


if(isset($_POST['action'])) {
	if($_POST['action']== _ENREGISTRER_ANNONCE) {
		registerAd($mysql);
	}
}

function registerAd($mysql) {
	$title = htmlspecialchars($_POST[_TITLE]);
	$category = isset($_POST[_CATEGORY]) ? htmlspecialchars($_POST[_CATEGORY]) : 0;
	$departure_city = htmlspecialchars($_POST[_DEPARTURE_CITY]);
	$destination_city = htmlspecialchars($_POST[_DESTINATION_CITY]);
	$date_beginning = isset($_POST[_DATE_BEGINNING]) ? htmlspecialchars($_POST[_DATE_BEGINNING]) : '';
	$date_end = isset($_POST[_DATE_END]) ? htmlspecialchars($_POST[_DATE_END]) : '';
	$total_weight = htmlspecialchars($_POST[_TOTAL_WEIGHT]);
	$objects_number = isset($_POST[_OBJECTS_NUM]) ? htmlspecialchars($_POST[_OBJECTS_NUM]) : '';
	$total_volume = htmlspecialchars($_POST[_TOTAL_VOLUME]);
	$description = htmlspecialchars($_POST[_DESCRIPTION]);
	
	// Check the fields
	if(empty($description)) {
		$rank = _DESCRIPTION;
		$msg = _MANQUE_DESCRIPTION;
	}
	
	if(empty($total_volume)) {
		$rank = _TOTAL_VOLUME;
		$msg = _MANQUE_VOLUME_TOTAL;
	}
	
	if(empty($objects_number)) {
		$rank = _OBJECTS_NUM;
		$msg = _MANQUE_NOMBRE_D_OBJETS;
	}
	
	if(empty($total_weight)) {
		$rank = _TOTAL_WEIGHT;
		$msg = _MANQUE_POIDS_TOTAL;
	}
	
	if(empty($date_end)) {
		$rank = _DATE_END;
		$msg = _MANQUE_DATE_FIN;
	}
	
	if(empty($date_beginning)) {
		$rank = _DATE_BEGINNING;
		$msg = _MANQUE_DATE_DEBUT;
	} elseif (dateScreenToMySql($date_beginning) > dateScreenToMySql($date_end)) {
		$rank = _DATE_END;
		$msg = _DATES_FIN_DEBUT_INVERSEES ;
	}
	
	if(empty($destination_city)) {
		$rank = _DESTINATION_CITY;
		$msg = _MANQUE_LOCALITE_DESTINATION;
	}
	
	if(empty($departure_city)) {
		$rank = _DEPARTURE_CITY;
		$msg = _MANQUE_LOCALITE_DEPART;
	}
	
	if(empty($category)) {
		$rank = _CATEGORY;
		$msg = _MANQUE_CATEGORIE;
	}
	
	if(empty($title)){
		$rank = _TITLE;
		$msg = _MANQUE_TITRE;
	}

	if(isset($rank)) {
		$_SESSION['rank'] = $rank;
		$_SESSION['msg'] = $msg;
		$_SESSION['form_data'] = array(	'title' => $title, 
										'category' => $category,
										'departure_city' => $departure_city,
										'destination_city' => $destination_city,
										'description' => $description,
										'total_weight' => $total_weight,
										'date_beginning' => $date_beginning,
										'date_end' => $date_end,
										'objects_num' => $objects_number,
										'total_volume' => $total_volume
		);
		
		header("location: ../../pages/inputAd.php");
		exit;
	}
	
	
	
	if(isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		$userId = $user->getId();
		echo 'check_info_ad (l. 133) userId=' . $userId;
	} 
	if (!isset($userId) || $userId == 0) {
		$userId = 1;
	}
	
	$ad = new Ad(0, $userId, $category, $departure_city, $destination_city, $title, $description, $total_weight, $objects_number, $total_volume, dateScreenToMySql($date_beginning), dateScreenToMySql($date_end));
	 
	$result = $mysql->createAd($ad);
	
	// Vider ou adapter les variables de session
	unset($_SESSION['form_data']);
	$_SESSION["rank"] = "succeed";
	$_SESSION["msg"] = _ANNONCE_ENREGISTREE;
	
	echo '<script type="text/javascript">window.alert("' . $result . '");</script>';
}

function dateScreenToMySql($screenDate) {
	$mysqlDate = substr($screenDate, 6, 4) . '-'
			. substr($screenDate, 3, 2) . '-'
			. substr($screenDate, 0 , 2);
	return $mysqlDate;
}

