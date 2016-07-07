<?php
/************************************************************\
 *
 * File			adDetails-advertiser.php
 *
 * Language		PHP
 *
 * Author		Anthony Cheseaux
 * Creation		20160705
 *
 * Project		teemw
 * Package		include
 *
 * Description	common header
 *
 \************************************************************/
require_once ('../ressources/templates/header.php');
require_once ('../tools/database/mysqladmanager.php');
require_once ('../business/ad.php');

if(isset($_SESSION['rank'])) {
	$rank = $_SESSION['rank'];
	$msg = $_SESSION['msg'];
	echo '<script type="text/javascript">window.alert("' . $msg . '");</script>';
	unset($_SESSION['rank']);
}
 
?>

<body>

	<div class="container">
	<div style="text-align: center">
		<h2 style="text-align: center;"><?php echo _AD_DETAILS?></h2>
		<br>
		<FORM><INPUT Type="button" VALUE="X" onClick="window.location.href='./adlist-advertiser.php';" class="buttonCloseAdDetails"></FORM>
<?php

$ad_id = $_GET ['id'];

// $namedb = 'grp1';
// $db = 'localhost';
// $user = 'root';
// $pwd = '';
// $error = 'Could not connect';

// if (! mysql_connect ( $db, $user, $pwd ) || ! mysql_select_db ( $namedb )) {
// 	die ( $error );
// }


$adManager = new MySqlAdManager ();

if ($ad = $adManager->getAd ( $ad_id )) {
	if (empty ( $ad )) {
		die ( $error );
	}
}


?>

<table class="table-striped" id="ad-details" style="text-align: left">
			<tr>
				<td><?php echo _AD_TITLE ?></td>
				<td><?php echo $ad->getTitle () ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_CATEGORY ?></td>
				<td><?php $c = $ad->getCategory(); echo constant($c);  ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_DESCRIPTION ?></td>
				<td><?php echo $ad->getDescription() ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_DEPARTURE_CI ?></td>
				<td><?php echo $ad->getDeparture_city () ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_DATE_BEG ?></td>
				<td><?php echo $ad->getDate_beginning() ?></td>
			</tr>

			<tr>
				<td><?php echo _AD_DESTINATION_CI ?></td>
				<td><?php echo $ad->getDestination_city () ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_DATE_END ?></td>
				<td><?php echo $ad->getDate_end() ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_TOTAL_WEIGHT ?></td>
				<td><?php echo $ad->getTotal_weight() ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_TOTAL_VOLUME ?></td>
				<td><?php echo $ad->getTotal_volume() ?></td>
			</tr>
			
			<tr>
				<td><?php echo _AD_OBJECT_NUM ?></td>
				<td><?php 
				
				if($ad->getObjects_number() == '') {
					echo("-");
				}
				else {
					echo $ad->getObjects_number();
				}
				 
				
				?></td>
			</tr>
</table>

<div style="    margin:50px 0px; padding:0px; text-align:center;align:center;">
<form method="post" action="../tools/business/check_info_ad.php" style="display: inline-block;text-align: center;">
		<table>
			<tr><td>
			<input class="btn btn-default" type="submit" name="action" value="<?php echo _AD_DELETE?>">
			</td></tr>
		</table>
	</form>
	<br>
	<hr>
	<!-- Essais d'afficher un devis -->
Devis : <br>
<form method="post" action ="../tools/business/check_info_estimate.php">
<input type ="submit" name="action" value="affiche devis">
</form>
	<!-- Display estimate -->
<?php 
if(isset($_SESSION['estimate'])){
	$estimate = $_SESSION['estimate'];
	?>
	<table width="360">
  <tr>
    <th>Shipper</th>
    <th>Price</th>
    <th>Selection</th>
  </tr>
  <!-- Pour chaque élément dans le tableau "$estimate" on crée un formulare avec les données du devis -->
	<?php 
	foreach ($estimate as $element){
		$element = unserialize($element);
		
		?>
<form method="post" action="../tools/business/check_info_estimate.php">
<tr>
	<td><?php echo 'Shipper '.$element->getShipper()?></td>
	<td><?php echo $element->getPrice().'.-'?></td>
<!-- l'input "hidden" contient l'id du transporteur -->
	<td><input type="submit" name="action" value="Select shipper"> </td><input type="hidden" name="id_estimate" value=<?php echo $element->getId();?>>
</tr>
</form>
<?php 
	}
}?>
</table>
	
</div>
	</div>
	</div>
</body>

<?php
require '../ressources/templates/footer-backoffice.php';
?>
