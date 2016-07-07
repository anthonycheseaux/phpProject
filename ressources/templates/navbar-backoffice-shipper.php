<?php
/************************************************************\
 *
 * File			navbar-backoffice.php
 *
 * Language		PHP
 *
 * Author		Anthony Cheseaux
 * Creation		20160707
 *
 * Project		teemw
 * Package		include
 * 
 * Description	common header
 * 
 \************************************************************/

require_once ('../ressources/templates/header.php');
?>
<body>
	<nav class="navbar navbar-full navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="./adlist.php">BACKOFFICE TEEMW</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="./infoShipper.php"><?php echo _INFO_USER?></a></li>
				<li><a href="./adlist.php"><?php echo _AD_LIST?></a></li>
			</ul>
<ul class="nav navbar-nav navbar-right">
					
						
					<!-- LOGOUT -->	
					<li><a href="../business/check_info_user.php?action=logout"><span
						class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					
				</ul>


				<ul class="nav navbar-nav navbar-right">
						
					<!-- LANGUAGES -->
					<li class="dropdown pull-right"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false"><?php echo _LANGUAGE?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="?lang=fr"><img src="image/frenchFlag.png"></a></li>
							<li role="separator" class="divider"></li>
							<li><a href="?lang=en"><img src="image/britishFlag.png"></a></li>
						</ul>
					</li>
				</ul>
		</div>
	</nav>
	
	<div style="width: 100%; height: 100px"></div>