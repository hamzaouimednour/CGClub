<?php
require_once('cgc-inc/class_build.php');
$component = $dance->sqli($dance->clean($_GET['component']));
switch ($component) {
    case 1:
        require_once('cgc-pages/actualites.php');
        break;
    case 2:
        require_once('cgc-pages/act-detail.php');
        break;
    case 3:
        require_once('cgc-pages/bibliotheque.php');
        break;
    case 4:
        require_once('cgc-pages/bib-detail.php');
        break;
    case 5:
        require_once('cgc-pages/contact.php');
        break;
    case 6:
        require_once('cgc-pages/inscription.php');
        break;
    case 404:
        require_once('cgc-pages/404.php');
        break;
    default:
        require_once('cgc-pages/main.php');
        break;
}

?>
