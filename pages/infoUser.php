
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
?>
<?php

if(empty($_SESSION['user'])){
	header("../pages/register.php");
	exit();
}

if (isset($_SESSION['user'])){
	$user = unserialize($_SESSION['user']);
	
	//var_dump($user);
	if($user->getRole()==3){
		echo 'Society : '.$user->getSociety().'</br>';
	}
	echo 'Titre : '.$user->getTitle().'</br>';
	echo 'Firstname : '.$user->getFirstname().'</br>';
	echo 'Lastname : '.$user->getLastname().'</br>';
	echo 'Adress 1&2 : '.$user->getAddress1().',  ';
	echo $user->getAddress2().'</br>';
	echo 'role : '.$user->getRole().'</br>';
	echo 'Email : '.$user->getEmail().'</br>';
	
?>
<br>
Update infos :<br>
<?php if(isset($_SESSION['rank'])){
	if ($_SESSION['rank'] == 30){
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
}

?>

<?php include_once '../ressources/templates/footer.php';?>	

