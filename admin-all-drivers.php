<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
include './header.php';
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: login.php');
}
$sql = "SELECT * from drivers where deleted_at is null";
$stmt = $DB->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="page-header">
    <h1>
        All Drivers
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
            <th>Licence No.</th>
            <th>Mobile No.</th>
            <!--				<th>Action</th>-->
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        foreach ($result as $data) : ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $data['driver_name']; ?></td>
                <td><?php echo $data['driver_licence_number']; ?></td>
                <td><?php echo $data['driver_mobile_number']; ?></td>
                <!--				<td>-->
                <!--					<a href="#" class="btn btn-sm btn-success rounded" title="View">-->
                <!--						<span class="glyphicon glyphicon-eye-open"></span>-->
                <!--					</a>-->
                <!--					<a href="#" class="btn btn-sm btn-primary rounded" title="Edit">-->
                <!--						<span class="glyphicon glyphicon-pencil"></span>-->
                <!--					</a>-->
                <!--					<a href="#" class="btn btn-sm btn-danger " title="Delete">-->
                <!--						<span class="glyphicon glyphicon-trash"></span>-->
                <!--					</a>-->
                <!--				</td>-->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="clearfix"></div>

