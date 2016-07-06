<?php
/************************************************************\
 *
 * File			adlist.php
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

?>

<body>

	<div class="container">
		<h2 style="text-align: center;">Détail de l'annonce</h2>
		<FORM><INPUT Type="button" VALUE="X" onClick="history.go(-1);return true;" class="buttonCloseAdDetails"></FORM>
<?php

$ad_id = $_GET ['id'];

$namedb = 'grp1';
$db = 'localhost';
$user = 'root';
$pwd = '';
$error = 'Could not connect';

if (! mysql_connect ( $db, $user, $pwd ) || ! mysql_select_db ( $namedb )) {
	die ( $error );
}

mysql_query ( "SET NAMES UTF8" );

$adManager = new MySqlAdManager ();

if ($ad = $adManager->getAd ( $ad_id )) {
	if (empty ( $ad )) {
		die ( $error );
	}
}


function chooseCategory($var) {
	
}

?>

<table class="table-striped" id="ad-details">
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

	</div>
</body>