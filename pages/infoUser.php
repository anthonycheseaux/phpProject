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

//Controle si l'utilisateur est connecté 
if(empty($_SESSION['user'])){
	header("../pages/register.php");
	exit();
}

//Redirection en cas de notification à afficher pour le transporteur
/*if(isset($_SESSION['estimate_accepted'])){
	header("../pages/alertShipper.php");
}
if(isset($_SESSION['estimate_refuser'])){
	header("../pages/alertShipper.php");
}
if(isset($_SESSION['infoCustomer'])){
	header("../pages/alertShipper.php");
}

//Redirection en cas de notification à afficher pour l'advertiser
if (isset($_SESSION['estimate'])){
	header("../pages/alertAdvertiser.php");
}

if(isset($_SESSION['infoShipper'])){
	header("../pages/alertAdvertiser.php");
}
*/

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



<div class="container">
	<h2 style="text-align: center; padding: 20px; padding-bottom: 50px"><?php echo _INFO_USER?></h2>
<table class="table-striped" id="user-info">
	<?php echo var_dump($user)?>
		<?php 	
			if($user->getRole()==3){
				echo '<tr><td>' . _US_SOCIETY . ':</td><td>'.$user->getSociety().'</td></tr>';
			}
		?>
	<tr>
		<td><?php echo _US_FIRSTNAME . ' & ' . _US_LASTNAME ?></td>
		<td>
		<?php 
			echo ': ' . strtoupper($user->getTitle()).' '.$user->getFirstname().' '.$user->getLastname();
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
</div>

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
		<?php echo _US_PASSWORD?>
		</td>
		<td>
		<input type="password" name="updatePassword" value="">
		</td>
	</tr>

	<tr>
		<td>
		<?php echo _US_ADRESS1?>
		</td>
		<td>
		<input type="text" name="updateAdress1" value="">
		</td>
	</tr>
	<tr>
		<td>
		<?php echo _US_ADRESS2?>
		</td>
		<td>
		<input type="text" name="updateAdress2" value="">
		</td>
	</tr>
	
	<tr>
		<td>
		<b><?php echo _US_CITY?></b>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo _CI_POSTCODE?>
		</td>
		<td>
		<input type="text" name="updatePostcode" value="">
		</td>
	</tr>
	<tr>
		<td>
		<?php echo _US_CITY?>
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
		<?php echo _US_SOCIETY?>
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
<?php echo _UPDATE_INFO?><br>
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
		<?php echo _US_PASSWORD?>
		</td>
		<td>
		<input type="password" name="updatePassword" value="">
		</td>
	</tr>

	<tr>
		<td>
		<?php echo _US_ADRESS1?>
		</td>
		<td>
		<input type="text" name="updateAdress1" value="">
		</td>
	</tr>
	<tr>
		<td>
		<?php echo _US_ADRESS2?>
		</td>
		<td>
		<input type="text" name="updateAdress2" value="">
		</td>
	</tr>
	
	<tr>
		<td>
		<b><?php echo _US_CITY?></b>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo _CI_POSTCODE?>
		</td>
		<td>
		<input type="text" name="updatePostcode" value="">
		</td>
	</tr>
	<tr>
		<td>
		<?php echo _US_CITY?>
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
		<?php echo _US_SOCIETY?>
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
<?php echo _TR_ESTIMATE?> <br>
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
<!-- Display estimate Accepted (for shipper) -->
<?php 
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
<!-- Display estimate Accepted (for shipper) -->
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
    <th><?php echo _DATE_BEGINNING?></th>
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


<!-- Essais d'afficher info sur le transporteur -->
<?php _TR_ESTIMATE?><br>
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
    <th><?php echo _TITLE?></th>
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

</tr>
</form>
<?php 
		}
	}
}?>


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

</div>

</body>


