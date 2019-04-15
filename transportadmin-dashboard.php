<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 19/3/19
 * Time: 10:19 PM
 */
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}
include './header.php';
?>
<div class="page-header">
    <h1>
        Transport Admin <?php echo $_SESSION['user']['name']; ?>'s Dashboard
        <span class="pull-right">
	</span>
    </h1>
    <div class="padding15 nlp nrp">
        <a href="all-drivers.php" class="btn btn-primary"> All Drivers</a>
        <a href="all-trucks.php" class="btn btn-primary"> All Trucks</a>
        <a href="all-orders.php" class="btn btn-primary"> All Orders</a>
        <a href="submit-a-requests.php" class="btn btn-primary"> Submit a Request</a>
    </div>
</div>
<div class="clearfix"></div>
