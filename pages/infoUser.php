<?php 

/************************************************************\
 *
 * File			infoUser.php
 *
 * Language		PHP
 *
 * Author		Sylvain Tauxe
 * Creation		20160418
 * modification 20160509
 *
 * Project		teemw
 *
 \************************************************************/
require_once ('../ressources/templates/navbar-backoffice-shipper.php');
require_once '../business/user.php';
require_once '../business/city.php';
require_once '../business/estimate.php';
?>
<?php

if(empty($_SESSION['user'])){
	header("../pages/register.php");
	exit();
}

if (isset($_SESSION['user'])){
	$user = unserialize($_SESSION['user']);}

// Si l'utilisateur est un admin, le rediriger
if ($user->getRole() == 1)
	header("location:infoAdmin.php");
	
if (isset($_SESSION['city'])){
	$city = unserialize($_SESSION['city']);}

// 	//var_dump($user);
// 	if($user->getRole()==3){
// 		echo 'Society : '.$user->getSociety().'</br>';
// 	}
// 	echo 'Titre : '.$user->getTitle().'</br>';
// 	echo 'Firstname : '.$user->getFirstname().'</br>';
// 	echo 'Lastname : '.$user->getLastname().'</br>';
// 	echo 'Adress 1&2 : '.$user->getAddress1().',  ';
// 	echo $user->getAddress2().'</br>';
// 	echo 'Postcode : '.$city->getPostcode().'   '.$city->getCityName().'<br>';
// 	echo 'State : '.$city->getState().'<br>';
	
// 	echo 'role : '.$user->getRole().'</br>';
// 	echo 'Email : '.$user->getEmail().'</br>';

	
?>

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
<br>
<!-- Display estimate Accepted (for shipper) -->
<?php 
if(isset($_SESSION['estimate_accepted'])){
	$estimate = $_SESSION['estimate_accepted'];
	
	?>
	Accepted :
	<br>
	<table width="360">
  <tr>
    <th>Shipper</th>
    <th>Title Ad</th>
    <th>Date Ad</th>
    <th>Price</th>
    <th>Selection</th>
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
<!-- Display estimate Accepted (for shipper) -->
<?php 
if(isset($_SESSION['estimate_refused'])){
	$estimate = $_SESSION['estimate_refused'];
	?>
	Refused :
	<br>
	<table width="360">
  <tr>
    <th>Shipper</th>
    <th>Title Ad</th>
    <th>Date Ad</th>
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


<!-- Essais d'afficher info sur le transporteur -->
Devis : <br>
<form method="post" action ="../tools/business/check_info_estimate.php">
<input type ="submit" name="action" value="info shipper">
</form>

<!-- Display estimate -->
<?php 
if(isset($_SESSION['infoShipper'])){
	$shipper = $_SESSION['infoShipper'];
	?>
	<table width="560">
  <tr>
    <th>Title AD</th>
    <th>Society</th>
    <th>Email</th>
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

</tr>
</form>
<?php 
		}
	}
}?>


<!-- Essais d'afficher info sur le client -->
Devis : <br>
<form method="post" action ="../tools/business/check_info_estimate.php">
<input type ="submit" name="action" value="info customer">
</form>


<?php 
if(isset($_SESSION['infoCustomer'])){
	$customer = $_SESSION['infoCustomer'];
	?>
	<table width="560">
  <tr>
    <th>Title AD</th>
    <th>Name</th>
    <th>Firstname</th>
    <th>Email</th>
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

</div>

</body>


