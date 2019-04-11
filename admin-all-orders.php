<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
include './header.php';
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: login.php');
}
?>
