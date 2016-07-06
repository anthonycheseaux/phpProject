<?php
/************************************************************\
 *
 * File			mysqladmanager.php
 *
 * Language		PHP
 *
 * Author		David Mack & Anthony Cheseaux
 * Creation		20160514
 * modification 
 *
 * Project		teemw
 *
 \************************************************************/
include_once '../ressources/templates/header.php';
require_once '../business/user.php';

// Si aucun utilisateur n'est connecté
if(empty($_SESSION['user'])) {
	header("location:register.php");
}

// Récupération de l'utilisateur
if (isset($_SESSION['user'])) {
	$user = unserialize($_SESSION['user']);
}

// Si l'utilisateur n'est pas un administrateur, le rediriger vers infoUser.php
if ($user->getRole() != 1) {
	header("location:infoUser.php");
}

?>
<!-- Transporteurs en fin d'abonnement -->
<form>
	
</form>
<!-- Validation des devis sélectionnés pour envoi des coordonnées mutuelles -->
<form>

</form>

