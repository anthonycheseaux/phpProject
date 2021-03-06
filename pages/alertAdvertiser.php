<!-- Essais d'afficher un devis -->
<?php require_once ('../ressources/templates/navbar-backoffice-shipper.php');
require_once '../business/user.php';
require_once '../business/city.php';
require_once '../business/estimate.php';?>

<div class="container">

<h2><?php echo _TR_ESTIMATE?></h2> <br>

<!-- Display estimate -->
<?php 
if(isset($_SESSION['estimate'])){
	$estimate = $_SESSION['estimate'];
	?>
	<table width="360">
  <tr>
    <th><?php echo _SHIPPER?></th>
    <th><?php echo _PRICE?></th>
    <th><?php echo _SELECTION?></th>
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
<br>


<!-- Affiche les infos sur le transporteur -->
Information sur les transporteurs : <br>
<?php 
if(isset($_SESSION['infoShipper'])){
	$shipper = $_SESSION['infoShipper'];
	?>
	<table width="560">
  <tr>
    <th><?php echo _US_TITLE?></th>
    <th><?php echo _US_SOCIETY?></th>
    <th><?php echo _US_EMAIL?></th>
  </tr>
  <!-- Pour chaque élément dans le tableau "$estimate" on crée un formulare avec les données du devis -->
	<?php 
	foreach ($shipper as $element){
		$element = unserialize($element);
		//Provisoir
		if($element!=null){
		?>

<form method="post" action="../tools/business/check_info_estimate.php">
<tr>
	<td><?php echo $element->getTitleAd();?></td>
	<td><?php echo $element->getSociety();?></td>
	<td><?php echo $element->getEmail();?></td>
	<td><input type="submit" name="action" value="archiver"/></td>
</tr>
</form>
<?php 
		}
	}
}?>
</table>
