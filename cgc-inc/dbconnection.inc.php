<?php
$dbname = "cgcehknu_cgc_db";
$dbconn = new PDO("mysql:host=localhost;dbname=$dbname", 'cgcehknu_spacex', 'cgcspacex1');
if(!$dbconn)
	die("> Failed Connected to DataBase");
?>
