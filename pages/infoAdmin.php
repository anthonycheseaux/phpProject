<?php
/************************************************************\
 *
 * File			infoAdmin.php
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
require_once ('../ressources/templates/navbar-backoffice-admin.php');
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
<body>
<div class="container">
	<div style="text-align: center">
		<h2 style="text-align: center;"><?php echo _SHIPPER_SUBSCRIPTION_FINISHED?></h2>
		<br>

<?php if (!empty($finishedSubscriptions)) { ?>
	 <table class="table-striped" id="user-info" style="text-align: left">
	 	<?php foreach ($finishedSubscriptions as $shipper) { ?>
	 		<tr>
	 			<form method="post" action="../tools/business/check_info_admin.php">
	 				<td><?php echo $shipper->getSociety()?></td>
	 				<td><?php echo $shipper->getEndDateShipper()?></td>
	 				<td><input type="submit" name="onemoreyear" value="<?php echo _ONE_MORE_YEAR;?>"><input type="hidden" name="shipper_id" value="<?php echo $shipper->getId();?>"></td>
	 			</form>
	 		</tr>
	 	<?php }?>
	 </table>
<?php } else {
echo '<em>' . _THERE_IS_NO_ONE . '</em>';
}?>

<!-- Transporteurs en fin d'abonnement -->
<h2><?php echo _SHIPPER_SUBSCRIPTION_END?></h2>
<?php if (!empty($endingSubscriptions)) { ?>

	 <table class="table-striped" id="user-info" style="text-align: left">
	 	<?php foreach ($endingSubscriptions as $shipper) { ?>
	 		<tr>
	 			<form method="post" action="../tools/business/check_info_admin.php">
	 				<td><?php echo $shipper->getSociety()?></td>
	 				<td><?php echo $shipper->getEndDateShipper()?></td>
	 				<td><input type="submit" name="onemoreyear" value="<?php echo _ONE_MORE_YEAR;?>"><input type="hidden" name="shipper_id" value="<?php echo $shipper->getId();?>"></td>
				</form>
	 		</tr>
	 	<?php }?>
	 </table>

<?php } else {
echo '<em>' . _THERE_IS_NO_ONE . '</em>';
}?>
<!-- Validation des devis sélectionnés pour envoi des coordonnées mutuelles -->
<h2><?php echo _ESTIMATE_TO_VALIDATE;?></h2>
<?php if (!empty($estimates)) {?>
	<table class="table-striped" id="user-info" style="text-align: left">
		<tr>
			<th><?php echo _ESTIMATE_NUMBER?></th>
			<th><?php echo _ADVERTISER?></th>
			<th><?php echo _SHIPPER?></th>
			<th><?php echo _PRICE?></th>
		</tr>
		<?php foreach ($estimates as $estimate) { ?>
			<tr>
				<form method="post" action="../tools/business/check_info_admin.php">
					<td><?php echo $estimate->getId()?></td>
					<td><?php $ad = $adManager->getAd($estimate->getAd()); $user = $userManager->getUser($ad->getUser()); echo $user->getFirstname() . ' ' . $user->getLastname() ; ?></td>
					<td><?php $user = $userManager->getUser($estimate->getShipper()) ; echo $user->getFirstname() . ' ' . $user->getLastname() ;?></td>
					<td><?php echo $estimate->getPrice();?></td>
					<td><input type="submit" name="validate" value="<?php echo _VALIDATE;?>"><input type="hidden" name="estimate_id" value="<?php echo $estimate->getId();?>"></td>
				</form>
			</tr>	
		<?php }?> 
	</table>
<?php } else {
echo '<em>' . _NO_ESTIMATE . '</em>';
}?>
</div></div>
</body>
<?php
require '../ressources/templates/footer-backoffice.php';
?>
