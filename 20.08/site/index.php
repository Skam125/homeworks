<?php
session_start();

/* adding functionality */
require_once 'settings.php';
require_once 'functions.php';

/* login check */
if (!isLogged()) {
    header('Location: login.php');
    die;
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    logout();
    header('Location: login.php');
    die;
}

if (isset($_POST['action']) && $_POST['action'] == 'saveStyle') {
    setcookie('style', $_POST['style'], time() + 60 * 60 * 60);
    $_COOKIE['style'] = $_POST['style'];
}
require_once 'templates/header.php';

/* adding content */
$page = getPageName($allowedPages);

include "pages/{$page}.php";


require_once 'templates/footer.php'; ?>






