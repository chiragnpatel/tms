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
    All Trucks
    <span class="pull-right">
    </span>
</h1>
<div>
    <a href="add-truck.php">Add new Truck</a>
</div>
<div class="clearfix"></div>