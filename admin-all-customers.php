<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
include './header.php';
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: login.php');
}
$sql = "SELECT * from tbl_users where role='customer'";
$stmt = $DB->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="page-header">
    <h1>
        All Customers
        <span class="pull-right">
	</span>
    </h1>
</div>
<!-- List-table -->
<div class="padding15 nlp nrp table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Index</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($result as $data) : ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="clearfix"></div>

