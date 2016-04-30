<?php
/************************************************************\
 *
 * File			login.php
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

include_once '../ressources/templates/header.php';
require_once '../business/user.php';

$msg = isset($_SESSION['msg']) ? '<span class="error">*'.$_SESSION['msg']."</span>" : '' ;
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array('','','','');
$rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : 0;
?>
<form method="post" action="../business/check_info_user.php">
<?php 
			if($rank==1) echo $msg;
			if($rank==-1) echo $msg;
			?>
	<table>
		<tr>
			<td>User :</td>
			<td><input type="text" name="email" /></td>
			
		</tr>
		<tr>
			<td>Password :</td>
			<td><input type="password" name="pwd" /></td>
		</tr>

		<tr>
			<td colspan="2" align="right"><input type="submit" value="Login"
				name="action" />
		</tr>
	</table>
</form>
<br/>
<a href="register.php">register</a>

<?php 

include_once '../ressources/templates/footer.php';
?>