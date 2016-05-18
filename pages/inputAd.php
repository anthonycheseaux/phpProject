<?php
/************************************************************\
 *
 * File			mysqladmanager.php
 *
 * Language		PHP
 *
 * Author		David Mack
 * Creation		20160514
 * modification 
 *
 * Project		teemw
 *
 \************************************************************/
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\teemw');
require_once '../ressources/config.php';
require_once (LIBRARY_PATH . "/templateFunctions.php");

// Récupération infos 
//$form_ad_data =  isset($_SESSION['ad_data']) ?  $_SESSION['ad_data'] : array();


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title><?php echo _SAISIR_ANNONCE ?></title>
<link rel="stylesheet" type="text/css" href="../css/datePicker.css">
<script type="text/javascript">
	var this_month = <?php echo json_encode(_CE_MOIS);?>;
	var close = <?php echo json_encode(_FERMER);?>;
	var monday = <?php echo json_encode(_JOUR_LU);?>;
	var tuesday = <?php echo json_encode(_JOUR_MA);?>;
	var wednesday = <?php echo json_encode(_JOUR_ME);?>;
	var thursday = <?php echo json_encode(_JOUR_JE);?>;
	var friday = <?php echo json_encode(_JOUR_VE);?>;
	var saturday = <?php echo json_encode(_JOUR_SA);?>;
	var sunday = <?php echo json_encode(_JOUR_DI);?>;
	var january = <?php echo json_encode(_JANVIER);?>;
	var february = <?php echo json_encode(_FEVRIER);?>;
	var march = <?php echo json_encode(_MARS);?>;
	var april = <?php echo json_encode(_AVRIL);?>;
	var may = <?php echo json_encode(_MAI);?>;
	var june = <?php echo json_encode(_JUIN);?>;
	var july = <?php echo json_encode(_JUILLET);?>;
	var august = <?php echo json_encode(_AOUT);?>;
	var september = <?php echo json_encode(_SEPTEMBRE);?>;
	var october = <?php echo json_encode(_OCTOBRE);?>;
	var november = <?php echo json_encode(_NOVEMBRE);?>;
	var december = <?php echo json_encode(_DECEMBRE);?>;
</script>
<script type="text/javascript" src="../js/datePicker.js"></script>
</head>
<body>
<?php echo _NOUVELLE_ANNONCE ?>
<form method="post" action="../tools/business/check_info_ad.php">
	<table>
		<!-- Titre de l'annonce -->
		<tr>
			<td><?php echo _AD_TITLE . " : "?></td>
			<td><input type="text" name="title" value=""/>
		</tr>
		<!-- Catégorie de l'annonce -->
		<tr>
			<td><?php echo _AD_CATEGORY . " : "?></td>
			<td><select name="category"><optgroup label="<?php echo _CHOISIR_CATEGORIE . '... '?>" ></optgroup>
				<option value=1><?php echo _CATEGORIE_DEMENAGEMENT?></option>
				<option value=2><?php echo _CATEGORIE_MOBILIER?></option>
				<option value=3><?php echo _CATEGORIE_ELECTROMENAGER?></option>
				<option value=4><?php echo _CATEGORIE_CARTONS?></option>
				<option value=5><?php echo _CATEGORIE_PALETTES?></option>
				<option value=6><?php echo _CATEGORIE_VEHICULES?></option>
				<option value=7><?php echo _CATEGORIE_DEUX_ROUES?></option>
				<option value=8><?php echo _CATEGORIE_BATEAU?></option>
				<option value=9><?php echo _CATEGORIE_ANIMAUX?></option>
				<option value=10><?php echo _CATEGORIE_DIVERS?></option>
			</optgroup></select></td>
		</tr>
		<!-- Localités de départ et d'arrivée -->
		<tr>
			<td><?php echo _AD_DEPARTURE_CI . ' : '?></td>
			<td><input type="text" name="departure_city"/></td>
		</tr>
		<tr>
			<td><?php echo _AD_DESTINATION_CI . ' : '?></td>
			<td><input type="text" name="destination_city"></td>
		</tr>
		<!-- Dates -->
		<tr>
			<td><?php echo _AD_DATE_BEG . ' : '?></td>
			<td><input type="text" disabled="disabled" name="date_beginning"/><input type="button" value="<?php echo _SELECTION?>" onclick="displayDatePicker('date_beginning', true, 'dmy', '.');"/></td>
		</tr>
		<tr>
			<td><?php echo _AD_DATE_END . ' : '?></td>
			<td><input type="text" disabled="disabled" name="date_end"/><input type="button" value="<?php echo _SELECTION?>" onclick="displayDatePicker('date_end', true, 'dmy', '.');"/></td>
		</tr>
		<!-- Poids total, nombre d'objects, volume total -->
		<tr>
			<td><?php echo _AD_TOTAL_WEIGHT . ' : '?></td>
			<td><input type="text" total_weight"/></td>
		</tr>
		<tr>
			<td><?php echo _AD_OBJECT_NUM . ' : '?></td>
			<td><input type="text" name="object_num"/></td>
		</tr>
		<tr>
			<td><?php echo _AD_TOTAL_VOLUME . ' : '?></td>
			<td><input type="text" name="total_volume"/></td>
		</tr>
		<!-- Description -->
		<tr>
			<td><?php echo _AD_DESCRIPTION . ' : '?></td>
			<td><textarea name="description" cols="30" rows="10"></textarea></td>
		</tr>
		<tr>
			<td><input type="submit" name="action" value="<?php echo _ENREGISTRER_ANNONCE?>" ></td>
		</tr>
	</table>
</form>
</body>
</html>