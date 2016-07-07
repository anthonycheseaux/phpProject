<?php

/************************************************************\
 *
 * File			infoAdvertiser.php
 *
 * Language		PHP
 *
 * Author		Anthony Cheseaux
 * Creation		20160418
 * modification 20160509
 *
 * Project		teemw
 *
 \************************************************************/
require '../ressources/templates/nav-backoffice-advertiser.php';
require_once '../business/user.php';
require_once '../business/city.php';
require_once '../business/estimate.php';
require_once '../tools/database/mysqlcitymanager.php';
?>

<?php

if (empty ( $_SESSION ['user'] )) {
	header ( "../pages/register.php" );
	exit ();
}

if (isset ( $_SESSION ['user'] )) {
	$user = unserialize ( $_SESSION ['user'] );
}

if (isset ( $_SESSION ['city'] )) {
	$city = unserialize ( $_SESSION ['city'] );
}

?>

<div class="container">

	<h2 style="text-align: center; padding: 20px; padding-bottom: 50px"><?php echo _INFO_USER?></h2>
	<table class="table-striped" id="user-info">


		<tr>
			<td><?php echo _US_FIRSTNAME . ' & ' . _US_LASTNAME ?></td>
			<td>
		<?php
		echo ': ' . strtoupper ( $user->getTitle () ) . ' ' . $user->getFirstname () . ' ' . $user->getLastname ();
		?>
		</td>
		</tr>
		<tr>
			<td><?php echo _US_ADRESS1 .' 1' ?></td>
			<td>
		<?php
		echo ': ' . $user->getAddress1 ();
		?>
		</td>
		</tr>
		<tr>
			<td><?php echo _US_ADRESS1 .' 2' ?></td>
			<td>
		<?php
		echo ': ' . $user->getAddress2 ();
		?>
		</td>
		</tr>
		<tr>
			<td><?php echo _US_CITY?></td>
			<td>
		<?php
		echo ': ' . $city->getPostcode () . '   ' . $city->getCityName () . ', ' . $city->getCountry ();
		?>
		</td>
		</tr>
		<tr>
			<td><?php echo _US_EMAIL?></td>
			<td>
		<?php
		echo ': ' . $user->getEmail ();
		?>
		</td>
		</tr>
	</table>
	<div style="text-align: center; margin: 50px;">
	<a class="btn btn-default" data-toggle="modal" href="#changeInfoModal"
		role="button"><?php echo _CHANGE_INFO_USER?>&raquo;</a>
	</div>
	<!-- Change Info Modal -->
	<div class="modal fade" id="changeInfoModal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="loginmodal-container" style="max-width: 450px;">
				<h1><?php echo _CHANGE_INFO_USER?></h1>
				<br>
				<?php
				
					if (isset ( $_SESSION ['rank'] )) {
					if ($_SESSION ['rank'] == 30) {
						echo $_SESSION ['msg'];
					}
					if ($_SESSION ['rank'] == 31) {
						echo $_SESSION ['msg'];
					}
				}
				?>
				<br>
				<form method="post" action="../business/check_info_user.php">
					<table>
						<tr>
							<td>Change password :</td>
							<td><input type="password" name="updatePassword" value=""></td>
						</tr>

						<tr>
							<td>New adress1 :</td>
							<td><input type="text" name="updateAdress1" value=""></td>
						</tr>
						<tr>
							<td>New adress2 :</td>
							<td><input type="text" name="updateAdress2" value=""></td>
						</tr>

						<tr>
							<td>New locality :</td>
												<td><select name="updateCity">
						<?php
						$cityManager = new MySqlCityManager();
						$cities = $cityManager->getAllCities();
							foreach ($cities as $city) {
								echo '<option value=' . $city->getId() . '>' . $city->getCityName() . ' ' . $city->getPostcode() . '</option>';
							}
						?>
					</select></td>
						</tr>
						<!--  
						<tr>
							<td>New postcode :</td>
							<td><input type="text" name="updatePostcode" value=""></td>
						</tr>
						<tr>
							<td>New city :</td>
							<td><input type="text" name="updateCity" value=""></td>
						</tr>
						-->
	<?php
	if ($user->getRole () == 3) {
		?>
	<tr>
							<td>New Society name :</td>
							<td><input type="text" name="updateSociety" value=""></td>
						</tr>
	<?php }?>
	<tr>
							<td colspan="2" align="right"><input class="btn btn-default" type="submit" name="action"
								value="<?php echo _CHANGE_INFO_USER?>"></td>
						</tr>
					</table>

				</form>
			</div>
		</div>
	</div>

</div>


<?php
require '../ressources/templates/footer-backoffice.php';
?>