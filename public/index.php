<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

if (!empty($_GET['action'])) {
    $url = $_GET['action'];
} else {
    $url = null;
}

require_once ROOT.'/Utils/autoloader.php';
require_once ROOT.'/Utils/whosonline.php';
require_once ROOT.'/Utils/fonctions.php';
require_once ROOT.'/Utils/permissions.php';
new Router($url);
