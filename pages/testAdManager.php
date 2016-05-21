<?php
/**
 * Fichier à supprimer. Permet de tester mysqladmanager
 */
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '\..');
//require_once '../ressources/templates/header.php';
include_once ('/tools/database/mysqladmanager.php');

$mysql = new MySqlAdManager();

$tableau = array();
$tableau = $mysql->getAllAds();
$nbAds = count($tableau);
echo 'Il y a ' . $nbAds . ' annonces' . '<br>';

foreach ($tableau as $ad) {
	echo $ad->getTitle() . '<br>';
}
