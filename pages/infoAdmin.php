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
require_once '../tools/database/mysqlestimatemanager.php';
require_once '../tools/database/mysqlmanager.php';

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

// Création de l'userManager et de l'adManager
$userManager = new MySqlManager();
$adManager = new MySqlAdManager();

// Récupérer les devis à facturer
$estimateManager = new MySqlEstimateManager();
$estimates = $estimateManager->getAllEstimatesByState(3);


?>
<!-- Transporteurs en fin d'abonnement -->
<form>
	 
</form>
<!-- Validation des devis sélectionnés pour envoi des coordonnées mutuelles -->
<h1><?php echo _ESTIMATE_TO_VALIDATE;?></h1>
<?php if (!empty($estimates)) {?>
<form method="post" action="../tools/business/check_info_admin.php">
	<table>
		<tr>
			<th><?php echo _ESTIMATE_NUMBER?></th>
			<th><?php echo _ADVERTISER?></th>
			<th><?php echo _SHIPPER?></th>
			<th><?php echo _PRICE?></th>
		</tr>
		<?php foreach ($estimates as $estimate) { var_dump($estimate)?>
			<tr>
				<td><?php echo $estimate->getId()?></td>
				<td><?php $ad = $adManager->getAd($estimate->getAd()); $user = $userManager->getUser($ad->getUser()); echo $user->getFirstname() . ' ' . $user->getLastname() ; ?></td>
				<td><?php $user = $userManager->getUser($estimate->getShipper()) ; echo $user->getFirstname() . ' ' . $user->getLastname() ;?></td>
				<td><?php echo $estimate->getPrice();?></td>
				<td><input type="submit" name="validate" value="<?php echo _VALIDATE;?>"><input type="hidden" name="estimate_id" value="<?php echo $estimate->getId();?>"></td>
			</tr>		
		<?php }?>
	</table>
</form>
<?php } else {
echo '<em>' . _NO_ESTIMATE . '</em>';
}?>
