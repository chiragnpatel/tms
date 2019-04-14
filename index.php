<?php $bodyClass="transparent-bg";?>
<?php
require_once './config.php';
if ($_SESSION['user']) {
    if ($_SESSION['user']['role'] == 'transportadmin') {
        header("Location: transportadmin-dashboard.php");
    } elseif ($_SESSION['user']['role'] == 'customer') {
        header("Location: customer-dashboard.php");
    } else {
        header("Location: admin-dashboard.php");
    }
}
include './header.php'; 
?>
<div class="banner" style="background-image: url('img/banner-truck.jpg');">
	<h1 class="title">Transport Managment System</h1>
</div>
<?php
include './footer.php';
?>