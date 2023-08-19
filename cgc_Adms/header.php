<?php
error_reporting(0);
session_start();
if(empty($_SESSION['user']) and strpos($_SERVER['PHP_SELF'], "cgc-login.php") == false){
  include("404.php");
  exit;
}
// include $_SERVER["DOCUMENT_ROOT"]."/cgc-inc/dbconnection.inc.php";
// include $_SERVER["DOCUMENT_ROOT"]."/cgc-inc/class_commons.inc.php";
include "../cgc-inc/dbconnection.inc.php";
include "../cgc-inc/class_commons.inc.php";
include "../cgc-inc/global_commons.inc.php";
include "../cgc-inc/security.inc.php";
$webmaster = new WebMaster($dbconn);
$dance = new Dance();
$alert = New Error();
$crypt = new FeistelCipherHelper();

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    if(strpos($_SERVER['PHP_SELF'], "cgc-login.php") == false  and empty($_SESSION['user']))
      echo "<title>Error 404</title>";
    elseif (strpos($_SERVER['PHP_SELF'], "cgc-login.php") != false)
      echo "<title>CGC Login</title>";
    else
      echo "<title>CGC Administrator Panel</title>";
     ?>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">

    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">

    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
  <link rel="stylesheet" href="css/form/all-type-forms.css">
<link rel="stylesheet" href="css/summernote/summernote.css">
  <!-- style CSS
  ============================================ -->
    <!-- notifications CSS
		============================================ -->
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="css/notifications/notifications.css">
<link rel="stylesheet" href="css/chosen/bootstrap-chosen.css">

  <link rel="stylesheet" href="css/alerts.css">
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
    .footer {
       position: fixed;
       left: 0;
       bottom: 0;
       width: 100%;
    }
    .text{
  width : 200px;
  overflow:hidden;
  display:inline-block;
  text-overflow: ellipsis;
  white-space: nowrap;
}
    .textmail{
    width : 450px;
    overflow:hidden;
    display:inline-block;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    .textsender{
    width : 120px;
    overflow:hidden;
    display:inline-block;
    text-overflow: ellipsis;
    }
.textdate{
    width : 150px;
    overflow:hidden;
    display:inline-block;
    text-overflow: ellipsis;
    }

    </style>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(50, 0).slideUp(500, function(){
        $(this).empty();
    });
}, 6000);
</script>

</head>
