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
include './header.php';
?>
<div class="page-header">
    <h1>
        Customer <?php echo $_SESSION['user']['name']; ?>'s Dashboard
        <span class="pull-right">
    </span>
    </h1>
    <div class="padding15 nlp nrp">
		<a href="customer-all-orders.php" class="btn btn-primary">All orders</a>
		<a href="find-service.php" class="btn btn-primary">Find Service</a>
	</div>
</div>
<div class="clearfix"></div>
