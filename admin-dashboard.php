<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 19/3/19
 * Time: 10:31 PM
 */
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
include './header.php';
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: login.php');
}
?>
<div class="page-header">
    <h1>
        Admin <?php echo $_SESSION['user']['name']; ?>'s Dashboard
        <span class="pull-right">
    </span>
    </h1>
    <div class="padding15 nlp nrp">
        <a href="admin-all-drivers.php" class="btn btn-primary"> All Drivers</a>
        <a href="admin-all-trucks.php" class="btn btn-primary"> All Trucks</a>
        <a href="admin-all-customers.php" class="btn btn-primary"> All Customers</a>
        <a href="admin-all-orders.php" class="btn btn-primary"> All Orders</a>
    </div>
</div>
<div class="clearfix"></div>

