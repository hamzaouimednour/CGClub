
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Computer Geek Club</title>
	<!-- Meta Tags -->
	<meta name="keywords" content="cgc, informatique, programmtion, formation, certification, club, esc sfax, computer geek club.">
	<meta name="description" content="cgc, informatique, programmtion, formation, certification, club, esc sfax, computer geek club.">
	<meta name="subject" content="">
	<meta name="copyright" content="Computer Geek Club">
	<meta name="language" content="fr">
	<meta name="robots" content="index,follow" />
	<meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />
	<meta name="abstract" content="cgc, informatique, programmtion, formation, certification, club, esc sfax, computer geek club.">
	<meta name="topic" content="cgc, informatique, programmtion, formation, certification, club, esc sfax, computer geek club.">
	<meta name="Classification" content="Informatique">
	<meta name="author" content="CGC, computergeekclub@cgc-escs.club">
	<meta name="copyright" content="Computer Geek Club 2018">
	<meta name="reply-to" content="computergeekclub@cgc-escs.club">
	<meta name="owner" content="Computer Geek Club">
	<meta name="url" content="<?='http://'.$_SERVER['HTTP_HOST']?>">
	<meta name="category" content="cgc, informatique, programmtion, formation, certification, club" />
	<meta name="coverage" content="Worldwide">
	<meta name="distribution" content="Global">
	<meta name="rating" content="General">
	<meta name="revisit-after" content="3 days">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?='http://'.$_SERVER['HTTP_HOST']?>/images/cgcicon.ico">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/normalize.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/icomoon.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/jquery-ui.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/transitions.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/main.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/color.css">
	<link rel="stylesheet" href="<?='http://'.$_SERVER['HTTP_HOST']?>/css/responsive.css">
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

	<style>
	.overflow-title{
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		}
		.centered {
  position: absolute;
  top: 50%;
  left: 40%;
  transform: translate(-50%, -50%);
}
	</style>
</head>
<body class="tg-home tg-homevtwo">

	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-headervtwo tg-haslayout">
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-navigationholder">
							<div class="tg-wishlistandcart">
									<div class="dropdown tg-currencydropdown">
								<nav id="tg-nav" class="tg-nav ">
									<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
										<ul>
										<?php
										if(empty($component))
											echo '<li class="menu-item-has-children current-menu-item">';
										else
											echo '<li class="menu-item-has-children">';
										?>
											<a href="index.php"><span class="icon-home"></span> Accueil</a>
										</li>

										<?php
										if($component==1 or $component==2 )
											echo '<li class="menu-item-has-children current-menu-item">';
										else
											echo '<li class="menu-item-has-children">';
										?>
											<a href="index.php?component=1"><span class="icon-list"></span> Actualités</a>
										</li>
										<?php
										if($component==3 or $component==4 )
											echo '<li class="menu-item-has-children current-menu-item">';
										else
											echo '<li class="menu-item-has-children">';
										?>
										<a href="index.php?component=3"><span class="icon-book"></span> Bibliothèque</a></li>
										<li><a href="#"><span class="icon-bookmark"></span> Événements</a></li>

										<?php
										if($component==5 )
											echo '<li class="menu-item-has-children current-menu-item">';
										else
											echo '<li class="menu-item-has-children">';
										?><a href="index.php?component=5"><span class="icon-envelope"></span> Contact</a></li>
										<?php
										if($component==6 )
											echo '<li class="menu-item-has-children current-menu-item">';
										else
											echo '<li class="menu-item-has-children">';
										?><a href="index.php?component=6"><span class="icon-user"></span> Inscription </a></li>
									</ul>
									</div>
								</nav>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?='http://'.$_SERVER['HTTP_HOST']?>/images/404-3.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>404 Error</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">Acceuil</a></li>
								<li class="tg-active">404 Error</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					404 Error Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-404error">
							<div class="col-xs-12 col-sm-12 col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
								<div class="tg-404errorcontent">
									<h2>Ooops! Page n'est pas exist</h2>
									<span>404</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					404 Error End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">

						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<strong class="tg-logo"><a href="javascript:void(0);"><img src="<?='http://'.$_SERVER['HTTP_HOST']?>/images/cgclogo.png" alt="Computer geek club"></a></strong>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>Route de l'aéroport km 4,5 - B.P. n° 1081 - 3018 ESCS Sfax</address>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto:computergeekclub@cgc-escs.club">computergeekclub@cgc-escs.club</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="https://www.facebook.com/ComputerGeekClub/" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Site map</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="index.php"><kbd>Accueil</kbd></a></li>
											<li><a href="index.php?component=1"><kbd>Actualités</kbd></a></li>
											<li><a href="index.php?component=3"><kbd>Bibliothèque</kbd></a></li>
											<li><a href="#"><kbd>Evénement</kbd></a></li>
											<li><a href="index.php?component=5"><kbd>Contact</kbd></a></li>
											<li><a href="index.php?component=6"><kbd>Inscription</kbd></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.8573550089563!2d10.706712050879622!3d34.73398978884597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13002b56317b303b%3A0xa91709bccec71bf8!2sEcole+Superieure+de+Commerce+ESC+Sfax!5e0!3m2!1sfr!2stn!4v1543411764320" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-newsletter">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<h4>Inscrivez-vous à la newsletter!</h4>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<form class="tg-formtheme tg-formnewsletter">
								<fieldset>
									<input type="email" name="email" class="form-control" placeholder="votre e-m@il">
									<button type="button"><i class="icon-envelope"></i></button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-copyright">2018 All &copy; Rights Reserved | <span class="fa fa-code"></span> By BX19</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/vendor/jquery-library.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/owl.carousel.min.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/jquery.vide.min.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/countdown.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/jquery-ui.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/parallax.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/countTo.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/appear.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/gmap3.js"></script>
	<script src="<?='http://'.$_SERVER['HTTP_HOST']?>/js/main.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
