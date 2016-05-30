<?php
/************************************************************\
 *
 * File				check_info_estimate.php
 *
 * Language			PHP
 *
 * Author			David Mack
 * Creation			20160528
 * modification 
 *
 * Project			teemw
 *
 \************************************************************/
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../..');
require_once '../../ressources/config.php';
require_once (LIBRARY_PATH . '/templateFunctions.php');
require_once 'tools/database/mysqlestimatemanager.php';
require_once '../../business/ad.php';

$estimateManager = new MySqlEstimateManager();

// constantes correspondant aux noms de champs
define ( "ID", "id" );
define ( "AD", "ad" );
define ( "PRICE", "price" );
define ( "SHIPPER", "shipper" );

if (isset($_POST['action']) && $_POST['action'] == _PROPOSER_UN_DEVIS) {
	registerEstimate($estimateManager);
}

if (isset($_POST['action']) && $_POST['action'] == "affiche devis") {
	
	displayEstimate($estimateManager);
}

function registerEstimate($estimateManager) {
	$ad = htmlspecialchars($_SESSION[AD]);
	$price = htmlspecialchars($_POST[PRICE]);
	$shipper = htmlspecialchars($_SESSION[SHIPPER]);
	
	// Check the fields
	if (empty($price)) {
		$rank = PRICE;
		$msg = _MANQUE_PRIX;
	}
	
	if (isset($rank)) {
		$_SESSION['rank'] = $rank;
		$_SESSION['msg'] = $msg;
		$_SESSION['es_form_data'] = array('ad' => $ad,
				'price' => $price,
				'shipper' => $shipper
		);
			
		header("location: ../../pages/inputEstimate.php");
		exit;
	}
	
	// Si on arrive là sans qu'il y ait un shipper, il y a un souci, en fait.
	$estimate = new Estimate(0, $ad, $price, $shipper);
	
	$result = $estimateManager->createEstimate($estimate);
	
	// Vider ou adapter les variables de session
	unset($_SESSION['es_form_data']);
	$_SESSION['rank'] = "succeed";
	$_SESSION['msg'] = _DEVIS_ENREGISTRE;
	
	echo '<script type="text/javascript">window.alert("' . $result . '");</script>';

}


function displayEstimate($estimateManager){
	
	//$ad = unserialize($_SESSION[AD]);
	$result = $estimateManager->getAllEstimatesByAd(3);
	
	$_SESSION['estimate'] = $result;
	
	header("location: ../../pages/infoUser.php");
	exit();
	
}

function validEstimate(){
	
}