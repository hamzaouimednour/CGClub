<?php
session_start();
if(empty($_SESSION['user'])) { include("404.php");exit;}
session_destroy();
header('location:cgc-login.php');
 ?>
