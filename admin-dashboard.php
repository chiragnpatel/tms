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
?>
<div class="page-header">
    <h1>
        Admin <?php echo $_SESSION['user']['name']; ?>'s Dashboard
        <span class="pull-right">
    </span>
    </h1>
</div>
<div class="clearfix"></div>

