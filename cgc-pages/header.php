
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Computer Geek Club</title>

	<?php
	if($_GET['component']==2 and !empty($dance->clean($dance->sqli($_GET['act_id'])))){
	?>
	<!-- FaceBook Meta -->
	<meta property="og:site_name" content="Computer Geek Club">
	<meta property="og:title" content="<?=stripslashes($news[0]->gettitle());?>">
	<meta property="og:description" content="<?=substr(htmlspecialchars(strip_tags($news[0]->getdescription())),0,100);?>...">
	<meta property="og:url" content="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
	<meta property="og:type" content="informatique, programmtion, formation, certification, club, news" />
	<meta property="og:image" content="<?='http://'.$_SERVER['HTTP_HOST'].'/images/news/cover/'.$news[0]->getphoto2();?>" />
	<?php
	}
	?>
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
	<link rel="shortcut icon" href="images/cgcicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

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
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
