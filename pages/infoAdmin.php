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

// Récupérer les transporteurs dont les abos se terminent
$in14days = date("Y-m-d", strtotime("+14 days"));
$endingSubscriptions = $userManager->getShipperSubscriptionByDate(date("Y-m-d"), $in14days);
$finishedSubscriptions = $userManager->getShipperSubscriptionByDate("1900-01-01", date("Y-m-d", strtotime("-1 days")));

// Récupérer les devis à facturer
$estimateManager = new MySqlEstimateManager();
$estimates = $estimateManager->getAllEstimatesByState(3);


?>
<!-- Transporteurs dont l'abonnement est terminé --> 
<h1><?php echo _SHIPPER_SUBSCRIPTION_FINISHED?></h1>
<?php if (!empty($finishedSubscriptions)) { ?>
<form method="post" action="../tools/business/check_info_admin.php">
	 <table>
	 	<?php foreach ($finishedSubscriptions as $shipper) { ?>
	 		<tr>
	 			<td><?php echo $shipper->getSociety()?></td>
	 			<td><?php echo $shipper->getEndDateShipper()?></td>
	 			<td><input type="submit" name="onemoreyear" value="<?php echo _ONE_MORE_YEAR;?>"><input type="hidden" name="shipper_id" value="<?php echo $shipper->getId();?>"></td>
	 		</tr>
	 	<?php }?>
	 </table>
</form>
<?php } else {
echo '<em>' . _THERE_IS_NO_ONE . '</em>';
}?>

<!-- Transporteurs en fin d'abonnement -->
<h1><?php echo _SHIPPER_SUBSCRIPTION_END?></h1>
<?php if (!empty($endingSubscriptions)) { ?>
<form method="post" action="../tools/business/check_info_admin.php">
	 <table>
	 	<?php foreach ($endingSubscriptions as $shipper) { ?>
	 		<tr>
	 			<td><?php echo $shipper->getSociety()?></td>
	 			<td><?php echo $shipper->getEndDateShipper()?></td>
	 			<td><input type="submit" name="onemoreyear" value="<?php echo _ONE_MORE_YEAR;?>"><input type="hidden" name="shipper_id" value="<?php echo $shipper->getId();?>"></td>
	 		</tr>
	 	<?php }?>
	 </table>
</form>
<?php } else {
echo '<em>' . _THERE_IS_NO_ONE . '</em>';
}?>
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
		<?php foreach ($estimates as $estimate) { ?>
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
