<?php
/************************************************************\
 *
 * File			register.php
 *
 * Language		PHP
 *
 * Author		Sylvain Tauxe
 * Creation		20160418
 * modification 20160424
 *
 * Project		teemw
 * 
 \************************************************************/
require_once ('../ressources/templates/header.php');

?>

<?php 
// R�cup�ration infos / message d'erreur
$rank = isset ( $_SESSION ['rank'] ) ? $_SESSION ['rank'] : 0;
$msg = isset ( $_SESSION ['msg'] ) ? '<span class="error">*' . $_SESSION ['msg'] . "</span>" : '';
$form_data_Shipper = isset ( $_SESSION ['form_data'] ) ? $_SESSION ['form_data'] : array (
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'' 
);
$form_data_User = isset ( $_SESSION ['form_data_user'] ) ? $_SESSION ['form_data_user'] : array (
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'' 
);
?>


Register for Shipper :
<form method="post" action="../business/check_info_user.php">
	<table>
		<!-- Display message if registration is successful -->
	<?php
	
	if ($rank == 'shipper_ok')
		echo $msg;
	?>
			
		<tr>
			<td>Title :</td>
			<td><input type="radio" name="title" value="Mister" />Mister</td>
			<td><input type="radio" name="title" value="Miss" />Miss<?php
			if ($rank == 5)
				echo $msg;
			?></td>
		</tr>

		<tr>
			<td>Society :</td>
			<td><input type="text" name="society"
				value="<?php echo $form_data_Shipper[10];?>" /><?php
				if ($rank == 11)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>First name :</td>
			<td><input type="text" name="firstname"
				value="<?php echo $form_data_Shipper[0];?>" /><?php
				if ($rank == 1)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Last name :</td>
			<td><input type="text" name="lastname"
				value="<?php echo $form_data_Shipper[1];?>" /><?php
				if ($rank == 2)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Email :</td>
			<td><input type="email" name="email"
				value="<?php echo $form_data_Shipper[9];?>" /><?php
				if ($rank == 10)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Password :</td>
			<td><input type="password" name="password"
				value="<?php echo $form_data_Shipper[2];?>" /><?php
				if ($rank == 4)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Adress 1 :</td>
			<td><input type="text" name="adress1"
				value="<?php echo $form_data_Shipper[4];?>" /><?php
				if ($rank == 6)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Adress 2 :</td>
			<td><input type="text" name="adress2"
				value="<?php echo $form_data_Shipper[5];?>" /></td>
		</tr>

		<tr>
			<td>Postcode :</td>
			<td><input type="text" name="postCode"
				value="<?php echo $form_data_Shipper[6];?>" /><?php
				if ($rank == 8)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>City :</td>
			<td><input type="text" name="cityName"
				value="<?php echo $form_data_Shipper[7];?>" /><?php
				if ($rank == 7)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Country :</td>
			<td><input type="text" name="country"
				value="<?php echo $form_data_Shipper[8];?>" /><?php
				if ($rank == 9)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td colspan="2" align="right"><input type="submit" name="action"
				value="Register as shipper"></td>
		</tr>
	</table>
</form>

Register for Customer :
<form method="post" action="../business/check_info_user.php">
	<table>
		<!-- Display message if registration is successful -->
	<?php
	if ($rank == 'customer_ok')
		echo $msg;
	?>
			
		<tr>
			<td>Title :</td>
			<td><input type="radio" name="title" value="Mister" />Mister
			
			<td><input type="radio" name="title" value="Miss" />Miss</td>
			<?php if ($rank==15) echo $msg ;?>
		</tr>

		<tr>
			<td>First name :</td>
			<td><input type="text" name="firstname"
				value="<?php echo $form_data_User[0];?>" /><?php
				if ($rank == 12)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Last name :</td>
			<td><input type="text" name="lastname"
				value="<?php echo $form_data_User[1];?>" /><?php
				if ($rank == 13)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Email :</td>
			<td><input type="email" name="email"
				value="<?php echo $form_data_User[9];?>" /><?php
				if ($rank == 20)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Password :</td>
			<td><input type="password" name="password"
				value="<?php echo $form_data_User[2];?>" /><?php
				if ($rank == 14)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Adress 1 :</td>
			<td><input type="text" name="adress1"
				value="<?php echo $form_data_User[4];?>" /><?php
				if ($rank == 16)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Adress 2 :</td>
			<td><input type="text" name="adress2"
				value="<?php echo $form_data_User[5];?>" /></td>
		</tr>

		<tr>
			<td>Postcode :</td>
			<td><input type="text" name="postCode"
				value="<?php echo $form_data_User[6];?>" /><?php
				if ($rank == 18)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>City :</td>
			<td><input type="text" name="cityName"
				value="<?php echo $form_data_User[7];?>" /><?php
				if ($rank == 17)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td>Country :</td>
			<td><input type="text" name="country"
				value="<?php echo $form_data_User[8];?>" /><?php
				if ($rank == 19)
					echo $msg;
				?></td>
		</tr>

		<tr>
			<td colspan="2" align="right"><input type="submit" name="action"
				value="Register as customer"></td>
		</tr>
	</table>
</form>

<br>
<!-- Pour detruire les sessions pendant les tests
<a href="../business/check_info_user.php?action=logout">Logout</a>
 -->
<a href="login.php">Login</a>
<br>


<?php

require_once ('../ressources/templates/footer.php');
?>