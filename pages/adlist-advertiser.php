<?php
/************************************************************\
 *
 * File			adlist-advertiser.php
 *
 * Language		PHP
 *
 * Author		Cyril Zufferey & Anthony Cheseaux
 * Creation		20160501
 *
 * Project		teemw
 * Package		include
 * 
 * Description	common header
 * 
 \************************************************************/
//require_once 'ressources/config.php';
require_once ('../ressources/templates/nav-backoffice-advertiser.php');
require_once ('../tools/database/mysqladmanager.php');

require_once '../business/user.php';
//require_once(LIBRARY_PATH . "/templateFunctions.php");

if(isset($_SESSION['rank'])) {
	$rank = $_SESSION['rank'];
	$msg = $_SESSION['msg'];
	echo '<script type="text/javascript">window.alert("' . $msg . '");</script>';
	unset($_SESSION['rank']);
}

$error = '';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css">
		<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>
		
		<script type="text/javascript" src="http://tablesorter.com/addons/pager/jquery.tablesorter.pager.js"></script>
		<script>
			$(document).ready( function () {
		    $('#myTable').DataTable();
		    } );
			$.extend( $.fn.dataTable.defaults, {
			    searching: false
			} );
			$('#myTable').DataTable( {
			    responsive: true
			} );
			$(document).on('click', '[data-href]', function () {
			    var url = $(this).data('href');
			    if (url && url.length > 0) {
			        document.location.href = url;
			        return false;
			    }
			});
		</script>
		
		<script>
		$(document).ready(function() { 
		    $("table") 
		    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
		    .tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
		
	</head>
<body>

	<div class="container-fluid" style="width: 70%">
	<h2 style="text-align: center; padding: 20px; padding-bottom: 50px"><?php echo _AD_LIST?></h2>
	
	<input class="btn btn-default" type="button" value="<?php echo _AD_CREATE?>" 
		onclick="window.location.href='./inputAd.php';" />
		
	<div style="width: 100%; height: 50px"></div>
	
		<table id="myTable" class="display responsive nowrap table-striped" cellspacing="0" width="100%" data-order='[[ 5, "asc" ]]'>
			<thead>
				<tr>
		            <?php echo '<th>' . _AD_TITLE . '</th>'?>
		            <?php echo '<th>' . _AD_DEPARTURE_CI . '</th>'?>
		            <?php echo '<th>' . _AD_DATE_BEG . '</th>'?>
		            <?php echo '<th>' . _AD_DESTINATION_CI . '</th>'?>
		            <?php echo '<th>' . _AD_DATE_END . '</th>'?>
		            <?php echo '<th>' . _AD_TOTAL_VOLUME . '</th>'?>
		            <?php echo '<th>' . _AD_TOTAL_WEIGHT . '</th>'?>
				</tr>
			</thead>
			<tfoot>
				<tr>
		            <?php echo '<th>' . _AD_TITLE . '</th>'?>
		            <?php echo '<th>' . _AD_DEPARTURE_CI . '</th>'?>
		            <?php echo '<th>' . _AD_DATE_BEG . '</th>'?>
		            <?php echo '<th>' . _AD_DESTINATION_CI . '</th>'?>
		            <?php echo '<th>' . _AD_DATE_END . '</th>'?>
		            <?php echo '<th>' . _AD_TOTAL_VOLUME . '</th>'?>
		            <?php echo '<th>' . _AD_TOTAL_WEIGHT . '</th>'?>
				</tr>
			</tfoot>
			<tbody>
			
			<?php
// 			$namedb = 'grp1';
// 			$db = 'localhost';
// 			$user = 'root';
// 			$pwd = '';
// 			$error = 'Could not connect';
			
			/*$query =  "SELECT ad.ad_id AS id, ad.ad_title AS title, ci1.city_name AS cityFrom, ci2.city_name AS cityTo,
 							 ad.ad_total_weight AS weight, ad.ad_total_volume AS volume, ad.ad_date_beginning AS dateBeg
						FROM AD ad INNER JOIN CITY ci1 ON (ad.ad_departure_city = ci1.city_id)
		   						   INNER JOIN CITY ci2 ON (ad.ad_destination_city = ci2.city_id)";
			
			$query2 = "SELECT ad_id FROM AD";*/
			
			$adinfo = array();
			
// 			if(!mysql_connect($db, $user, $pwd) || !mysql_select_db($namedb)){
// 				die($error);
// 			}
			
			
			$adManager = new MySqlAdManager();
			
			/*if($query_run = mysql_query($query)){				
				while($query_row = mysql_fetch_assoc($query_run)){
					$adinfo[] = $query_row;
				}*/
			
			if (isset ( $_SESSION ['user'] )) {
				$user = unserialize ( $_SESSION ['user'] );
			}
			
			if($adinfo = $adManager->getAllAdsFromTodayByAdvertiser(FALSE, $user->getId())){
				if(!empty($adinfo)){
				
				foreach ($adinfo as $ad){	
					$vard = 'style="cursor: pointer;" data-href="adDetails-advertiser.php?id=' . $ad->getId() . '"';		
					echo '<tr style="text-align:center;"> '
								 
								 . '<td '.$vard.'>' . $ad->getTitle() . '</td>'
								 . '<td '.$vard.'>' .$ad->getDeparture_city() . '</td>'
								 . '<td '.$vard.'>' .$ad->getDate_beginning() . '</td>'
								 . '<td '.$vard.'>' .$ad->getDestination_city() . '</td>'
								 . '<td '.$vard.'>' .$ad->getDate_end() . '</td>'
								 . '<td '.$vard.'>' .$ad->getTotal_volume() . ' m3</td>'
								 . '<td '.$vard.'>' .$ad->getTotal_weight() . ' kg</td></tr>';
				}
				}
			}
			else{
				die($error);
			}
			
			
		?>
			
			</tbody>
		</table>
	</div>
	
</body>

<?php
require '../ressources/templates/footer-backoffice.php';
?>