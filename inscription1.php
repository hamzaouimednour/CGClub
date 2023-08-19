<?php
error_reporting(0);
require "cgc-inc/class_build.php";
$GLOBALS['1'] = "Vous êtes déja inscrit !!";
$GLOBALS['2'] = "Le Nom ne doit pas dépasse [50] caractéres !!<br /> Réessayez svp .";
$GLOBALS['3'] = "E-mail ne doit pas dépasse [50] caractéres !!,<br /> Réessayez svp .";
$GLOBALS['4'] = "Filiére ne doit pas dépasse [30] caractéres !! ,<br /> Réessayez svp .";
$GLOBALS['5'] = "Erreur Intervenu !! , Réessayez svp .";
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Inscription CGC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta NAME="DESCRIPTION" CONTENT="Computer Geek Club CGC">
        <meta NAME="KEYWORDS" CONTENT="Computer Geek Club , ecole supérieur de commerce sfax , formations microsoft , certification , CGC, programming languages certification , inscription CGC">
        <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<meta NAME="Expires" CONTENT="never">
	<meta NAME="AUTHOR" CONTENT="Computer Geek Club CGC">
        <meta NAME="OWNER" CONTENT="Computer Geek Club CGC">
	<meta NAME="SUBJECT" CONTENT="Computer Geek Club  , CGC , certifications microsoft, formations , programming languages, IT ">
	<meta NAME="RATING" CONTENT="General">
        <meta NAME="ABSTRACT" CONTENT="Computer Geek Club  , CGC">
	<meta HTTP-EQUIV="Content-language" CONTENT="fr">
	<meta NAME="Language" CONTENT="fr">
	<meta NAME="COPYRIGHT" CONTENT="Computer Geek Club  , CGC 2018">
	<meta NAME="CATEGORY" CONTENT="commerce">
	<meta NAME="REPLY-TO" CONTENT="cgc.escs@gmail.com">
	<meta name="robots" content="index, follow, all">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="inscription/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="inscription/css/util.css">
	<link rel="stylesheet" type="text/css" href="inscription/css/main.css">
<!--===============================================================================================-->
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(50, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
</script>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('inscription/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <?php
		$action = $_GET['act'];
		$error = $_GET['error'];
		if(empty($error) && $action == "success")
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="alert-heading"><b>Success !</b></h3>
                  <hr>
                  votre inscription effectuée avec succès.
                  </div>';

        if($action == "failed" && !empty($error))
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="alert-heading"><b>Failed !</b></h3>
                <hr>
                Erreur d\'inscription : <p class="alert-heading" >'.$GLOBALS[$error].'</p>
                </div>';
		if(!empty($_POST)){
			$checkmember = $webmaster->view_members(strip_tags($dance->sqli($_POST['email'])));
			if(!empty($checkmember)){
				$error = "1";
			}elseif(strlen($nom)>50){
			    $error = "2";
			}elseif (strlen($email)>50) {
			    $error = "3";
			}elseif (strlen($filiere)>30){
			    $error = "4";
			}else{
			    $error="";
			}
			if(empty($error)){
			$member_data = array(
			'email'=>$dance->sqli(strip_tags($_POST['email'])),
			'nom'=>$dance->sqli(strip_tags($_POST['nom'])),
			'tel'=>$dance->sqli(strip_tags($_POST['tel'])),
			'filiere'=>$dance->sqli(strip_tags($_POST['filiere']))
			);
			$objmember = new MemberCgc();
			$objmember->memberItem($member_data);
			if($webmaster->add_member($objmember)){
			  $dance->redirect($_SERVER['PHP_SELF'].'?act=success');
			}else{
			  $dance->redirect($_SERVER['PHP_SELF']."?act=failed&error=5");
			}
			}else {
				$dance->redirect($_SERVER['PHP_SELF']."?act=failed&error=$error");
			}
		}

         ?>
				<form class="login100-form validate-form" autocomplete="off" method="post">
					<span class="login100-form-title p-b-49">
						Inscription CGC
					</span>


					<div class="wrap-input100 validate-input m-b-23" data-validate = "Inserer Votre Nom  & Prenom">
						<span class="label-input100">Nom & Prenom</span>
						<input class="input100" type="text" name="nom" placeholder="Votre Nom  & Prenom" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Inserer Votre E-mail">
						<span class="label-input100">E-mail</span>
						<input class="input100" type="email" name="email" placeholder="Votre E-mail" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf200;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Inserer Votre Numéro">
						<span class="label-input100">Numéro de télephone</span>
						<input class="input100" type="text" name="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern=".{8,8}" maxlength="8" placeholder="Votre Numéro" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf202;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Inserer Votre Filiére">
						<span class="label-input100">Filiére</span>
						<input class="input100" type="text" name="filiere" placeholder="Votre Filiére" autocomplete="off">
						<span class="focus-input100" data-symbol="&#xf174;"></span>
					</div>



					<div class="text-right p-t-8 p-b-31">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Inscription
							</button>
						</div>
                                                <div class="text-center p-t-31 p-b-2"><small>&copy; 2018 : <a href="mailto:computergeekclub@cgc-escs.club" target="_top">computergeekclub@cgc-escs.club</a></small>
					</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="inscription/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="inscription/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="inscription/vendor/bootstrap/js/popper.js"></script>
	<script src="inscription/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="inscription/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="inscription/vendor/daterangepicker/moment.min.js"></script>
	<script src="inscription/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="inscription/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="inscription/js/main.js"></script>

</body>
</html>
