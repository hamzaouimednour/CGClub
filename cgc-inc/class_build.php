<?php
error_reporting(0);
// include $_SERVER["DOCUMENT_ROOT"]."/cgc-inc/dbconnection.inc.php";
// include $_SERVER["DOCUMENT_ROOT"]."/cgc-inc/class_commons.inc.php";
ob_start();
include "./cgc-inc/dbconnection.inc.php";
include "./cgc-inc/class_commons.inc.php";
include "./cgc-inc/global_commons.inc.php";
include "./cgc-inc/security.inc.php";
$webmaster = new WebMaster($dbconn);
$dance = new Dance();
$crypt = new FeistelCipherHelper();
$alert = New Error();
?>
