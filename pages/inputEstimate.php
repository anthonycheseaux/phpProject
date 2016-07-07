<?php
/************************************************************\
 *
 * File				inputEstimate.php
 *
 * Language			PHP
 *
 * Author			David Mack
 * Creation			28 mai 2016
 * modification 
 *
 * Project			teemw
 *
 \************************************************************/
set_include_path ( get_include_path () . PATH_SEPARATOR . dirname ( __FILE__ ) . '\..' );
require_once '../ressources/templates/header.php';
require_once '../ressources/config.php';
require_once (LIBRARY_PATH . '/templateFunctions.php');
require_once '../tools/database/mysqladmanager.php';
require_once '../tools/database/mysqlmanager.php';

// constantes correspondant aux noms de champs utilisés dans l'array $form_data
define ( "ID", "id" );
define ( "AD", "ad" );
define ( "PRICE", "price" );
define ( "SHIPPER", "shipper" );

// Récupération des infos et des messages d'erreur
$rank = isset ( $_SESSION ['rank'] ) ? $_SESSION ['rank'] : '';
$msg = isset ( $_SESSION ['msg'] ) ? '<span style="color: red;">*' . $_SESSION ['msg'] . '</span>' : '';
$form_data = isset ( $_SESSION ['es_form_data'] ) ? $_SESSION ['es_form_data'] : array (
		'ad' => '',
		'price' => '',
		'shipper' => '' 
);
if (isset ( $_SESSION ['es_form_data'] ))
	unset ( $_SESSION ['es_form_data'] );
$ad = new Ad ();
if (isset ( $_GET ['ad'] )) {
	$adManager = new MySqlAdManager ();
	$ad = $adManager->getAd ( htmlspecialchars ( $_GET ['ad'] ) );
	$_SESSION ['ad'] = $ad->getId ();
}
if (! isset ( $ad ) || $ad == null) {
	$ad = new Ad ();
	$ad->setTitle ( _PAS_D_ANNONCE );
	$_SESSION ['ad'] = 0;
}

if (isset ( $_SESSION ['user'] ))
	$user = unserialize($_SESSION['user']);
	
	// TODO suppress those 2 lines
$userManager = new MySqlManager ();
$user = $userManager->getUser ( 2 );

$_SESSION[SHIPPER] = $user->getId();

?>

<body>

	<div class="container">
			<FORM><INPUT Type="button" VALUE="X" onClick="window.location.href='./adDetails.php?id=<?php echo $ad->getId();?>';" class="buttonCloseAdDetails"></FORM>
	
	<div style="text-align: center">
		<h2 style="text-align: center;"><?php echo _SAISIR_DEVIS?></h2>
		<br>
		
		<h3 style="text-align: center;"><?php echo "Annonce: " . $ad->getTitle();?></h3>
		<br>
		<div style="width: 50%; ">
		<form method="post" action="../tools/business/check_info_estimate.php">

		<table id="estimate" >

			<tr>
				<!-- Prix proposé -->
				<td><?php echo _PRIX_PROPOSE . ' : '?></td>
				<td><input type="text" name="price"
					value="<?php echo $form_data[PRICE];?>" /><?php if ($rank == PRICE) echo $msg;?></td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="action"
					value="<?php echo _PROPOSER_UN_DEVIS ?>" /></td>
			</tr>
			
		</table>
	</form></div>
	
	</div>
	</div>
</body>
</html>

