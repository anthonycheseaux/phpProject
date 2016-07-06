
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

	//var_dump($user);
	if($user->getRole()==3){
		echo 'Society : '.$user->getSociety().'</br>';
	}
	echo 'Titre : '.$user->getTitle().'</br>';
	echo 'Firstname : '.$user->getFirstname().'</br>';
	echo 'Lastname : '.$user->getLastname().'</br>';
	echo 'Adress 1&2 : '.$user->getAddress1().',  ';
	echo $user->getAddress2().'</br>';
	echo 'Postcode : '.$city->getPostcode().'   '.$city->getCityName().'<br>';
	echo 'State : '.$city->getState().'<br>';
	
	echo 'role : '.$user->getRole().'</br>';
	echo 'Email : '.$user->getEmail().'</br>';

	
?>
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
<?php include_once '../ressources/templates/footer.php';?>	


