<?php
/************************************************************\
 *
 * File			check_info_admin.php
 *
 * Language		PHP
 *
 * Author		David Mack
 * Creation		20160706
 * modification
 *
 * Project		teemw
 *
 \************************************************************/
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '\..\..');
require_once ('../../ressources/config.php');
require_once (LIBRARY_PATH . "/templateFunctions.php");
require_once 'tools/database/mysqlestimatemanager.php';
require_once 'tools/database/mysqlmanager.php';

// Création de l'estimateManager et de l'userManager
$estimateManager = new MySqlEstimateManager();
$userManager = new MySqlManager();

// Validation d'un devis
if (isset($_POST['validate'])) {
	$estimateId = htmlspecialchars($_POST['estimate_id']);
	$estimate = $estimateManager->getEstimate($estimateId);

	// Si le devis est en état 3
	if($estimate != null && $estimate->getState() == 3) {
		$estimateManager->updateEstimateState($estimate->getId(), 4);
	}
}

// Prolongation d'un abonnement
if (isset($_POST['onemoreyear'])) {
	$shipperId = htmlspecialchars($_POST['shipper_id']);
	$shipper = $userManager->getUser($shipperId);
	$oldDate = $shipper->getEndDateShipper(); 
	echo $oldDate . '*';
	$newDate = substr($oldDate, 0, 3) . (substr($oldDate, 3, 1) + 1) . substr($oldDate, 4);
	$shipper->setEndDateShipper($newDate);
	var_dump($shipper);
	$userManager->update($shipper);
}

header("location:../../pages/infoAdmin.php");