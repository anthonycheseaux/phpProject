
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
include_once '../ressources/templates/header.php';
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

<body>

<div class="container-fluid">
	<h2 style="text-align: center; padding: 20px; padding-bottom: 50px"><?php echo _INFO_USER?></h2>
<table class="table-striped" id="user-info" style="text-align: center">
	<tr>
		<td>
		<?php 	
			if($user->getRole()==3){
				echo _US_SOCIETY . ' '.$user->getSociety().'</br>';
			}
		?>
		</td>
	</tr>
	<tr>
		<td>
		<?php 
			echo strtoupper($user->getTitle()).' '.$user->getFirstname().' '.$user->getLastname();
		?>
		</td>
	</tr>
	<tr>
		<td>
		<?php 
			echo $user->getAddress1(). ' ' . $user->getAddress2();
		?>
		</td>
	</tr>
	<tr>
		<td>
		<?php 
			echo $city->getPostcode().'   '.$city->getCityName();
		?>
		</td>
	</tr>
	<tr>
		<td>
		<?php 
			echo $city->getState();
			
			
		?>
		</td>
	</tr>
	<tr>
		<td>
		<?php 
			echo $user->getEmail();
		?>
		</td>
	</tr>

</table>

<a class="btn btn-default" data-toggle="modal" href="#changeInfoModal"role="button"><?php echo _CHANGE_INFO_USER?>&raquo;</a>

<!-- Register Customer Modal -->
	<div class="modal fade" id="changeInfoModal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="loginmodal-container">
				<h1><?php echo _CHANGE_INFO_USER?></h1>
				<br>
				<?php if(isset($_SESSION['rank'])){
	if ($_SESSION['rank'] == 30){
		echo $_SESSION['msg'];
	}
	if ($_SESSION['rank'] == 31){
		echo $_SESSION['msg'];
	}
}
?>
<br>
<form method="post" action="../business/check_info_user.php">
<table>
	<tr>
		<td>
		Change password :
		</td>
		<td>
		<input type="password" name="updatePassword" value="">
		</td>
	</tr>

	<tr>
		<td>
		New adress1 :
		</td>
		<td>
		<input type="text" name="updateAdress1" value="">
		</td>
	</tr>
	<tr>
		<td>
		New adress2 :
		</td>
		<td>
		<input type="text" name="updateAdress2" value="">
		</td>
	</tr>
	
	<tr>
		<td>
		<b>New locality :</b>
		</td>
	</tr>
	<tr>
		<td>
		New postcode :
		</td>
		<td>
		<input type="text" name="updatePostcode" value="">
		</td>
	</tr>
	<tr>
		<td>
		New city :
		</td>
		<td>
		<input type="text" name="updateCity" value="">
		</td>
	</tr>
	
	<?php 
		if($user->getRole()==3){
	?>
	<tr>
		<td>
		New Society name :
		</td>
		<td>
		<input type="text" name="updateSociety" value="">
		</td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="2" align="right"> <input type="submit" name="action" value="Update your info"></td>			
	</tr>
</table>

</form>
			</div>
		</div>
	</div>

<br>
Update infos :<br>
<?php if(isset($_SESSION['rank'])){
	if ($_SESSION['rank'] == 30){
		echo $_SESSION['msg'];
	}
	if ($_SESSION['rank'] == 31){
		echo $_SESSION['msg'];
	}
}
?>
<br>
<form method="post" action="../business/check_info_user.php">
<table>
	<tr>
		<td>
		Change password :
		</td>
		<td>
		<input type="password" name="updatePassword" value="">
		</td>
	</tr>

	<tr>
		<td>
		New adress1 :
		</td>
		<td>
		<input type="text" name="updateAdress1" value="">
		</td>
	</tr>
	<tr>
		<td>
		New adress2 :
		</td>
		<td>
		<input type="text" name="updateAdress2" value="">
		</td>
	</tr>
	
	<tr>
		<td>
		<b>New locality :</b>
		</td>
	</tr>
	<tr>
		<td>
		New postcode :
		</td>
		<td>
		<input type="text" name="updatePostcode" value="">
		</td>
	</tr>
	<tr>
		<td>
		New city :
		</td>
		<td>
		<input type="text" name="updateCity" value="">
		</td>
	</tr>
	
	<?php 
		if($user->getRole()==3){
	?>
	<tr>
		<td>
		New Society name :
		</td>
		<td>
		<input type="text" name="updateSociety" value="">
		</td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="2" align="right"> <input type="submit" name="action" value="Update your info"></td>			
	</tr>
</table>

</form>
<a href="../business/check_info_user.php?action=logout">Logout</a>

<?php 
//}
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

</div>

</body>


