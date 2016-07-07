


<!-- Display estimate Accepted (for shipper) -->
<?php 
require_once ('../ressources/templates/navbar-backoffice-shipper.php');
require_once '../business/user.php';
require_once '../business/city.php';
require_once '../business/estimate.php';

if(isset($_SESSION['estimate_accepted'])){
	$estimate = $_SESSION['estimate_accepted'];
	
	?>
	<?php echo _ACCEPTE?>
	<br>
	<table width="360">
  <tr>  
    <th><?php echo _SHIPPER?></th>
    <th><?php echo _TITLE?></th>
    <th><?php echo _DATE_BEGINNING?></th>
    <th><?php echo _PRICE?></th>
    <th><?php echo _SELECTION?></th>
  </tr>
  <!-- Pour chaque élément dans le tableau "$estimate" on crée un formulare avec les données du devis -->
	<?php 
	foreach ($estimate as $element){
		$element = unserialize($element);
		//var_dump($element);
		?> 
<form method="post" action="../tools/business/check_info_estimate.php">
<tr>
	<td><?php echo 'Id estimate '.$element->getId()?></td>
	<td><?php echo $element->getTitleAd()?></td>
	<td><?php echo $element->getBeginDateAd()?></td>
	<td><?php echo $element->getPrice().'.-'?></td>
<!-- l'input "hidden" contient le devis lu -->
<?php
$element = serialize($element);
$element = urlencode($element);
		?>
	<td><input type="submit" name="action" value="OK"> </td><input type="hidden" name="estimate" value=<?php echo $element;?>>
</tr>
</form>
<?php 
	}
}?>
</table>


<br>
<!-- Display estimate Refused (for shipper) -->
<?php 
if(isset($_SESSION['estimate_refused'])){
	$estimate = $_SESSION['estimate_refused'];
	?>
	<?php echo _REFUSE?>
	<br>
	<table width="360">
  <tr>
  	<th><?php echo _SHIPPER?></th>
    <th><?php echo _TITLE?></th>
    <th><?php echo _DATE?></th>
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
	<td><?php echo 'Id estimate '.$element->getId()?></td>
		<td><?php echo $element->getTitleAd()?></td>
	<td><?php echo $element->getBeginDateAd()?></td>
	<td><?php echo $element->getPrice().'.-'?></td>
<!-- l'input "hidden" contient le devis lu -->
<?php
$element = serialize($element);
$element = urlencode($element);
		?>
	<td><input type="submit" name="action" value=""> </td><input type="hidden" name="estimate" value=<?php echo $element;?>>
</tr>
</form>
<?php 
	}
}?>
</table>


<!-- Essais d'afficher info sur le client -->
<?php _TR_ESTIMATE?><br>
<form method="post" action ="../tools/business/check_info_estimate.php">
<input type ="submit" name="action" value="info customer">
</form>


<?php
if(isset($_SESSION['infoCustomer'])){
	$customer = $_SESSION['infoCustomer'];
	?>
	<table width="560">
  <tr>
    <th><?php echo _TITLE?></th>
    <th><?php echo _US_LASTNAME?></th>
    <th><?php echo _US_FIRSTNAME?></th>
    <th><?php echo _US_EMAIL?></th>
  </tr>
  <!-- Pour chaque élément dans le tableau "$estimate" on crée un formulare avec les données du devis -->
	<?php
	foreach ($customer as $element){
		$element = unserialize($element);
		//Provisoir
		if($element!=null){
		?>

<form method="post" action="../tools/business/check_info_estimate.php">
<tr>
	<td><?php echo $element->getTitleAd();?></td>
	<td><?php echo $element->getLastname();?></td>
	<td><?php echo $element->getFirstname();?></td>
	<td><?php echo $element->getEmail();?></td>

</tr>
</form>
<?php
		}
	}
}?>