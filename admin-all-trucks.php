<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
include './header.php';
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: login.php');
}
$sql = "SELECT * from trucks where deleted_at is null";
$stmt = $DB->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="page-header">
    <h1>
        All Trucks
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
            <th>Truck Name</th>
            <th>Truck Registartion No</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($result as $data) : ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $data['truck_name']; ?></td>
                <td><?php echo $data['rto_number']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="clearfix"></div>

