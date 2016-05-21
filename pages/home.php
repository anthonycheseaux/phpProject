<?php
require_once ('../ressources/templates/header.php');
require_once ('../ressources/config.php');
?>
<body>
	<nav class="navbar navbar-full navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#myNavbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">TEEMW</a>
			</div>
			<div id="myNavbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a class="page-scroll" href="#test1">Test 1</a></li>
					<li><a class="page-scroll" href="#test2">Test 2</a></li>
					<li><a class="page-scroll" href="#test3">Test 3</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a data-toggle="modal" href="#loginModal"><?php echo _LOGIN?></a></li>
					<li class="dropdown pull-right"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false"><?php echo _REGISTER?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a data-toggle="modal" href="#registerShipperModal"><?php echo _I_AM_A_SHIPPER?></a></li>
							<li role="separator" class="divider"></li>
							<li><a data-toggle="modal" href="#registerCustomerModal"><?php echo _I_AM_A_CUSTOMER?></a></li>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="loginmodal-container">
				<h1><?php echo _LOGIN?></h1>
				<br>
				<?php
				$msg = isset ( $_SESSION ['msg'] ) ? '<span class="error">*' . $_SESSION ['msg'] . "</span>" : '';
				$form_data = isset ( $_SESSION ['form_data'] ) ? $_SESSION ['form_data'] : array (
						'',
						'',
						'',
						'' 
				);
				$rank = isset ( $_SESSION ['rank'] ) ? $_SESSION ['rank'] : 0;
				?>
				  <form method="post" action="../business/check_info_user.php">
					<?php
					if ($rank == 1)
						echo $msg;
					if ($rank == - 1)
						echo $msg;
					?>
					<input type="text" name="email"
						placeholder="<?php echo _US_EMAIL?>" required> <input
						type="password" name="pwd" placeholder="<?php echo _US_PASSWORD?>"
						required> <input type="submit" name="action"
						class="login loginmodal-submit" value="<?php echo _LOGIN?>"
						required>
				</form>
			</div>
		</div>
	</div>

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
	
	 <?php
	//if ($rank == 'shipper_ok'){?>
	<!--<br>
	<br>
		<div class="alert alert-success" role="alert">
		<strong>Success!</strong> Indicates a successful or positive action.
		</div>-->
	<?php
	// }
	//var_dump($rank);
	//$rank=-1;
	
	?> 	
	
	<!-- Register Shipper Modal -->
	<div class="modal fade" id="registerShipperModal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="loginmodal-container">
				<h1><?php echo _REGISTER_FOR_SHIPPER?></h1>
				<br>
				<form method="post" action="../business/check_info_user.php">

					<!-- Display message if registration is successful -->
	<?php
	
	if ($rank == 'shipper_ok')
		echo $msg;
	?>
					<!-- Title -->
					<table>
						<tr>
							<td><input type="radio" name="title" value="mr" /><?php echo _MR?></td>
							<td><input type="radio" name="title" value="ms" /><?php echo _MS?></td>
							<?php if ($rank == 5) echo $msg;?>
						</tr>
					</table>

					<!-- Society -->
					<input type="text" placeholder="<?php echo _US_SOCIETY?>"
						value="<?php echo $form_data_Shipper[10];?>" required>
					<?php if ($rank == 11) echo $msg; ?>
								
					<!-- Firstname -->
					<input type="text" placeholder="<?php echo _US_FIRSTNAME?>"
						value="<?php echo $form_data_Shipper[0];?>" required>
					<?php if ($rank == 1) echo $msg; ?>

					<!-- Lastname -->
					<input type="text" placeholder="<?php echo _US_LASTNAME?>"
						value="<?php echo $form_data_Shipper[1];?>" required /><?php
						if ($rank == 2)
							echo $msg;
						?>

					<!-- Email -->
					<input type="email" placeholder="<?php echo _US_EMAIL?>"
						value="<?php echo $form_data_Shipper[9];?>" required /><?php
						if ($rank == 10)
							echo $msg;
						?>

					<!-- Password -->
					<input type="password" placeholder="<?php echo _US_PASSWORD?>"
						value="<?php echo $form_data_Shipper[2];?>" required /><?php
						if ($rank == 4)
							echo $msg;
						?>

					<!-- Address1 -->
					<input type="text" placeholder="<?php echo _US_ADRESS1?>"
						value="<?php echo $form_data_Shipper[4];?>" required /><?php
						if ($rank == 6)
							echo $msg;
						?>

					<!-- Address2 -->
					<input type="text" placeholder="<?php echo _US_ADRESS2?>"
						value="<?php echo $form_data_Shipper[5];?>" />

					<!-- Postcode -->
					<input type="text" placeholder="<?php echo _NIP?>"
						value="<?php echo $form_data_Shipper[6];?>" required /><?php
						if ($rank == 8)
							echo $msg;
						?>

					<!-- City -->
					<input type="text" placeholder="<?php echo _US_CITY?>"
						value="<?php echo $form_data_Shipper[7];?>" required /><?php
						if ($rank == 7)
							echo $msg;
						?>

					<!-- Country -->
					<input type="text" placeholder="<?php echo _CI_COUNTRY?>"
						value="<?php echo $form_data_Shipper[8];?>" required /><?php
						if ($rank == 9)
							echo $msg;
						?>

					<!-- Create -->
					<input type="submit" name="action" value="<?php echo _CREATE?>"
						class="login loginmodal-submit">
				</form>
			</div>
		</div>
	</div>

	<!-- Register Customer Modal -->
	<div class="modal fade" id="registerCustomerModal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="loginmodal-container">
				<h1><?php echo _REGISTER_FOR_CUSTOMER?></h1>
				<br>
				<form method="post" action="../business/check_info_user.php">

					<!-- Display message if registration is successful -->
				<?php if ($rank=='customer_ok') echo $msg ;?>
			
					<!-- Title -->
					<table>
						<tr>
							<td><input type="radio" name="title" value="mr" /><?php echo _MR?></td>
							<td><input type="radio" name="title" value="ms" /><?php echo _MS?></td>
							<?php if ($rank==15) echo $msg ;?>
						</tr>
					</table>

					<!-- Firstname -->
					<input type="text" placeholder="<?php echo _US_FIRSTNAME?>"
						value="<?php echo $form_data_User[0];?>" required>
					<?php if ($rank==12) echo $msg ;?>

					<!-- Lastname -->
					<input type="text" placeholder="<?php echo _US_LASTNAME?>"
						value="<?php echo $form_data_User[1];?>" required /><?php
						if ($rank == 13)
							echo $msg;
						?>

					<!-- Email -->
					<input type="email" placeholder="<?php echo _US_EMAIL?>"
						value="<?php echo $form_data_User[9];?>" required /><?php
						if ($rank == 20)
							echo $msg;
						?>

					<!-- Password -->
					<input type="password" placeholder="<?php echo _US_PASSWORD?>"
						value="<?php echo $form_data_User[2];?>" required /><?php
						if ($rank == 14)
							echo $msg;
						?>

					<!-- Address1 -->
					<input type="text" placeholder="<?php echo _US_ADRESS1?>"
						value="<?php echo $form_data_User[4];?>" required /><?php
						if ($rank == 16)
							echo $msg;
						?>

					<!-- Address2 -->
					<input type="text" placeholder="<?php echo _US_ADRESS2?>"
						value="<?php echo $form_data_User[5];?>" />

					<!-- Postcode -->
					<input type="text" placeholder="<?php echo _NIP?>"
						value="<?php echo $form_data_User[6];?>" required /><?php
						if ($rank == 18)
							echo $msg;
						?>

					<!-- City -->
					<input type="text" placeholder="<?php echo _US_CITY?>"
						value="<?php echo $form_data_User[7];?>" required /><?php
						if ($rank == 17)
							echo $msg;
						?>

					<!-- Country -->
					<input type="text" placeholder="<?php echo _CI_COUNTRY?>"
						value="<?php echo $form_data_User[8];?>" required /><?php
						if ($rank == 19)
							echo $msg;
						?>

					<!-- Create -->
					<input type="submit" name="action" value="<?php echo _CREATE?>"
						class="login loginmodal-submit">
				</form>
			</div>
		</div>
	</div>

	<!-- Carousel -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="first-slide"
					src="data:image/back.gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Example headline.</h1>
						<p>
							Note: If you're viewing this page via a
							<code>file://</code>
							URL, the "next" and "previous" Glyphicon buttons on the left and
							right might not load/display properly due to web browser security
							rules.
						</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Sign up
								today</a>
						</p>
					</div>
				</div>
			</div>
			<div class="item">
				<img class="second-slide"
					src="data:image/back.gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Another example headline.</h1>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.
							Donec id elit non mi porta gravida at eget metus. Nullam id dolor
							id nibh ultricies vehicula ut id elit.</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Learn
								more</a>
						</p>
					</div>
				</div>
			</div>
			<div class="item">
				<img class="third-slide"
					src="data:image/back.gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>One more for good measure.</h1>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.
							Donec id elit non mi porta gravida at eget metus. Nullam id dolor
							id nibh ultricies vehicula ut id elit.</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Browse
								gallery</a>
						</p>
					</div>
				</div>
			</div>
		</div>


		<a class="left carousel-control" href="#myCarousel" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
			aria-hidden="true"></span> <span class="sr-only">Previous</span>
		</a> <a class="right carousel-control" href="#myCarousel"
			role="button" data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- /.carousel -->


	<!-- Marketing messaging and featurettes
    ================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Generic placeholder image" width="140" height="140">
				<h2>Heading</h2>
				<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis
					euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
					Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
					Praesent commodo cursus magna.</p>
				<p>
					<a class="btn btn-default" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Generic placeholder image" width="140" height="140">
				<h2>Heading</h2>
				<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
					eget lacinia odio sem nec elit. Cras mattis consectetur purus sit
					amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor
					mauris condimentum nibh.</p>
				<p>
					<a class="btn btn-default" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Generic placeholder image" width="140" height="140">
				<h2>Heading</h2>
				<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in,
					egestas eget quam. Vestibulum id ligula porta felis euismod semper.
					Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
					nibh, ut fermentum massa justo sit amet risus.</p>
				<p>
					<a class="btn btn-default" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
		</div>
		<!-- /.row -->


		<!-- START THE FEATURETTES -->

		<hr id="test1" class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					First featurette heading. <span class="text-muted">It'll blow your
						mind.</span>
				</h2>
				<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
					Vestibulum id ligula porta felis euismod semper. Praesent commodo
					cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
					tellus ac cursus commodo.</p>
			</div>
		</div>

		<hr id="test2" class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7 col-md-push-5">
				<h2 class="featurette-heading">
					Oh yeah, it's that good. <span class="text-muted">See for yourself.</span>
				</h2>
				<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
					Vestibulum id ligula porta felis euismod semper. Praesent commodo
					cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
					tellus ac cursus commodo.</p>
			</div>
		</div>

		<hr id="test3" class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					And lastly, this one. <span class="text-muted">Checkmate.</span>
				</h2>
				<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
					Vestibulum id ligula porta felis euismod semper. Praesent commodo
					cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
					tellus ac cursus commodo.</p>
			</div>
		</div>

		<hr class="featurette-divider">

		<!-- /END THE FEATURETTES -->


	</div>
	<!-- /.container -->



	<!-- Script for smooth scroll -->
	<script>
		$(document).ready(function(){
		  // Add scrollspy to <body>
		  $('body').scrollspy({target: ".navbar", offset: 50});   
		
		  // Add smooth scrolling on all links inside the navbar
		  $("#myNavbar a").on('click', function(event) {
		
		    // Prevent default anchor click behavior
		    event.preventDefault();
		
		    // Store hash
		    var hash = this.hash;
		
		    $('html, body').animate({
		      scrollTop: $(hash).offset().top
		    }, 900, function(){
		   
		      // Add hash (#) to URL when done scrolling (default click behavior)
		      window.location.hash = hash;
		    });
		  });
		});
	</script>
</body>
<?php
require '../ressources/templates/footer.php';
?>
