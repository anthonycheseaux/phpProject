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
set_include_path ( get_include_path () . PATH_SEPARATOR . dirname ( __FILE__ ) . '\..' );
require_once 'ressources/templates/header.php';
require_once 'ressources/config.php';
require_once (LIBRARY_PATH . "/templateFunctions.php");

// constantes correspondant aux noms de champs utilisés dans l'array $form_data
define ( "_ID", "id" );
define ( "_CATEGORY", "category" );
define ( "_DEPARTURE_CITY", "departure_city" );
define ( "_DESTINATION_CITY", "destination_city" );
define ( "_TITLE", "title" );
define ( "_DESCRIPTION", "description" );
define ( "_TOTAL_WEIGHT", "total_weight" );
define ( "_OBJECTS_NUM", "objects_num" );
define ( "_TOTAL_VOLUME", "total_volume" );
define ( "_DATE_BEGINNING", "date_beginning" );
define ( "_DATE_END", "date_end" );

// Récupération des infos et des messages d'erreur
$rank = isset ( $_SESSION ['rank'] ) ? $_SESSION ['rank'] : '';
$msg = isset ( $_SESSION ['msg'] ) ? '<span style="color : red">* ' . $_SESSION ['msg'] . '</span>' : '';
$form_data = isset ( $_SESSION ['ad_form_data'] ) ? $_SESSION ['ad_form_data'] : array (
		'title' => '',
		'category' => '',
		'departure_city' => '',
		'destination_city' => '',
		'description' => '',
		'total_weight' => '',
		'date_beginning' => '',
		'date_end' => '',
		'objects_num' => '',
		'total_volume' => '' 
);
// TODO : supprimer l'array ad_form_data de la SESSION
echo $form_data [_DATE_BEGINNING] . '**';
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

<?php echo _NOUVELLE_ANNONCE?>
<form method="post" action="../tools/business/check_info_ad.php">
		<table>
			<!-- Titre de l'annonce -->
			<tr>
				<td><?php echo _AD_TITLE . " : "?></td>
				<td><input type="text" name="title"
					value="<?php echo $form_data[_TITLE];?>" /><?php if ($rank == _TITLE) echo $msg; ?></td>
			</tr>
			<!-- Cat�gorie de l'annonce -->
			<tr>
				<td><?php echo _AD_CATEGORY . " : "?></td>
				<td><select name="category">
						<option value="" disabled="disabled"
							<?php if ($form_data[_CATEGORY] == 0) echo 'selected="selected"'?>><?php echo _CHOISIR_CATEGORIE?></option>
						<option value=1
							<?php if ($form_data[_CATEGORY] == 1) echo 'selected="selected"'?>><?php echo _CATEGORIE_DEMENAGEMENT?></option>
						<option value=2
							<?php if ($form_data[_CATEGORY] == 2) echo 'selected="selected"'?>><?php echo _CATEGORIE_MOBILIER?></option>
						<option value=3
							<?php if ($form_data[_CATEGORY] == 3) echo 'selected="selected"'?>><?php echo _CATEGORIE_ELECTROMENAGER?></option>
						<option value=4
							<?php if ($form_data[_CATEGORY] == 4) echo 'selected="selected"'?>><?php echo _CATEGORIE_CARTONS?></option>
						<option value=5
							<?php if ($form_data[_CATEGORY] == 5) echo 'selected="selected"'?>><?php echo _CATEGORIE_PALETTES?></option>
						<option value=6
							<?php if ($form_data[_CATEGORY] == 6) echo 'selected="selected"'?>><?php echo _CATEGORIE_VEHICULES?></option>
						<option value=7
							<?php if ($form_data[_CATEGORY] == 7) echo 'selected="selected"'?>><?php echo _CATEGORIE_DEUX_ROUES?></option>
						<option value=8
							<?php if ($form_data[_CATEGORY] == 8) echo 'selected="selected"'?>><?php echo _CATEGORIE_BATEAU?></option>
						<option value=9
							<?php if ($form_data[_CATEGORY] == 9) echo 'selected="selected"'?>><?php echo _CATEGORIE_ANIMAUX?></option>
						<option value=10
							<?php if ($form_data[_CATEGORY] == 10) echo 'selected="selected"'?>><?php echo _CATEGORIE_DIVERS?></option>
				</select><?php if ($rank == _CATEGORY) echo $msg;?></td>
			</tr>
			<!-- Localit�s de d�part et d'arriv�e -->
			<tr>
				<td><?php echo _AD_DEPARTURE_CI . ' : '?></td>
				<td><input type="text" name="departure_city"
					value="<?php echo $form_data[_DEPARTURE_CITY]?>" /><?php if ($rank == _DEPARTURE_CITY) echo $msg; ?></td>
			</tr>
			<tr>
				<td><?php echo _AD_DESTINATION_CI . ' : '?></td>
				<td><input type="text" name="destination_city"
					value="<?php echo $form_data[_DESTINATION_CITY]?>"><?php if ($rank == _DESTINATION_CITY) echo $msg; ?></td>
			</tr>
			<!-- Dates -->
			<tr>
				<td><?php echo _AD_DATE_BEG . ' : '?></td>
				<td><input type="text" name="date_beginning" readonly="readonly"
					value="<?php echo $form_data[_DATE_BEGINNING]?>" /> <input
					type="button" value="<?php echo _SELECTION?>"
					onclick="displayDatePicker('date_beginning', false, 'dmy', '.');" />
			<?php if ($rank == _DATE_BEGINNING) echo $msg; ?></td>
			</tr>
			<tr>
				<td><?php echo _AD_DATE_END . ' : '?></td>
				<td><input type="text" name="date_end" readonly="readonly"
					value="<?php echo $form_data[_DATE_END]?>" /> <input type="button"
					value="<?php echo _SELECTION?>"
					onclick="displayDatePicker('date_end', false, 'dmy', '.');" />
			<?php if ($rank == _DATE_END) echo $msg; ?></td>
			</tr>
			<!-- Poids total, nombre d'objects, volume total -->
			<tr>
				<td><?php echo _AD_TOTAL_WEIGHT . ' [kg] : '?></td>
				<td><input type="text" name="total_weight"
					value="<?php echo $form_data[_TOTAL_WEIGHT]?>" />
			<?php if ($rank == _TOTAL_WEIGHT) echo $msg;?></td>
			</tr>
			<tr>
				<td><?php echo _AD_OBJECT_NUM . ' : '?></td>
				<td><input type="text" name="objects_num"
					value="<?php echo $form_data[_OBJECTS_NUM];?>" />
			<?php if ($rank == _OBJECTS_NUM) echo $msg;?></td>
			</tr>
			<tr>
				<td><?php echo _AD_TOTAL_VOLUME . ' [L] : '?></td>
				<td><input type="text" name="total_volume"
					value="<?php echo $form_data[_TOTAL_VOLUME]; ?>" />
			<?php if ($rank == _TOTAL_VOLUME) echo $msg; ?></td>
			</tr>
			<!-- Description -->
			<tr>
				<td><?php echo _AD_DESCRIPTION . ' : '?></td>
				<td><textarea name="description" cols="30" rows="10"><?php echo $form_data[_DESCRIPTION]?></textarea>
			<?php if ($rank == _DESCRIPTION) echo $msg; ?></td>
			</tr>
			<tr>
				<td><input type="submit" name="action"
					value="<?php echo _ENREGISTRER_ANNONCE?>"></td>
			</tr>
		</table>
	</form>
</body>
</html>
