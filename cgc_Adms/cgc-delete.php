<?php
error_reporting(0);
ob_start();
require "header.php";
if($_POST['item'] == 'event'){
    $photo = $webmaster->sqlview('cgc_events','id',$dance->sqli($_POST['id']));
    unlink('../images/events/'.$photo["photo"]);
    $webmaster->del('cgc_events','id',$dance->sqli($_POST['id']));
}
if($_POST['item'] == 'member')
    $webmaster->del('cgc_members','email',$dance->sqli($_POST['email']));
if($_POST['item'] == 'msg')
    $webmaster->del('cgc_contact','id',$dance->sqli($_POST['id']));
if($_POST['item'] == 'admin'){
    $email = $crypt->decode($_POST['id']);
    $adm = $webmaster->view_admin($dance->sqli($email));
    if($adm[0]->getdel() != "no")
        $webmaster->del('cgc_admin','email',$dance->sqli($email));
}
if($_POST['item'] == 'category')
    $webmaster->del('cgc_category','id',$dance->sqli($_POST['id']));
if($_POST['item'] == 'book'){
    $photo = $webmaster->sqlview('cgc_books','id',$dance->sqli($_POST['id']));
    unlink('../images/books/'.$photo["photo"]);
    $webmaster->del('cgc_books','id',$dance->sqli($_POST['id']));
}
if($_POST['item'] == 'news'){
    $photo = $webmaster->sqlview('cgc_news','id',$dance->sqli($_POST['id']));
    unlink('../images/news/main/'.$photo["photo"]);
    unlink('../images/news/cover/'.$photo["photo2"]);
    $webmaster->del('cgc_news','id',$dance->sqli($_POST['id']));
}
?>