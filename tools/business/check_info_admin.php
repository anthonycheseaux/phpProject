<?php
/************************************************************\
 *
 * File			mysqladmanager.php
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

// Création de l'estimateManager
$estimateManager = new MySqlEstimateManager();

// Récupération des infos du post
if (isset($_POST['validate'])) {
	echo $_POST['estimate_id'];
	$estimate = $estimateManager->getEstimate($_POST['estimate_id']);

	// Si le devis est en état 3
	if($estimate != null && $estimate->getState() == 3) {
		$estimateManager->updateEstimateState($estimate->getId(), 4);
	}
}

header("location:../../pages/infoAdmin.php");