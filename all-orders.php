<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}
include './header.php';
?>
<h1>
    All Orders
    <span class="pull-right">
    </span>
</h1>
<div class="clearfix"></div>