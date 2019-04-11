<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}
$transport_company_id = $_SESSION['user']['id'];
$trucks = "SELECT * FROM trucks where deleted_at is null ";
$stmt = $DB->prepare($trucks);
$stmt->execute();
$results = $stmt->fetchAll();
include './header.php';
?>
<div class="page-header">
    <h1>
        All Trucks
        <span class="pull-right">
	</span>
    </h1>
    <div class="padding15 nlp nrp">
        <a href="add-truck.php" class="btn btn-primary">Add new Truck</a>
    </div>
</div>
<!-- List-table -->
<div class="padding15 nlp nrp table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Index</th>
            <th>Truck Name</th>
            <th>Truck Registartion No</th>
            <th>Driver Name</th>
<!--            <th>Action</th>-->
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        <?php foreach ($results as $data) :
            $id = $data['driver_id']; ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $data['truck_name']; ?></td>
                <td><?php echo $data['rto_number']; ?></td>
                <?php
                $drivers = 'select * from drivers where id = :id and transport_company_id = :transport_company_id and deleted_at is null ' ;
                $stmt = $DB->prepare($drivers);
                $stmt->bindValue(":transport_company_id", $transport_company_id);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $driverName = $stmt->fetch();
                ?>
                <td><?php echo $driverName['driver_name']; ?></td>
<!--                <td>-->
<!--                    <a href="#" class="btn btn-sm btn-success rounded" title="View">-->
<!--                        <span class="glyphicon glyphicon-eye-open"></span>-->
<!--                    </a>-->
<!--                    <a href="#" class="btn btn-sm btn-primary rounded" title="Edit">-->
<!--                        <span class="glyphicon glyphicon-pencil"></span>-->
<!--                    </a>-->
<!--                    <a href="#" class="btn btn-sm btn-danger " title="Delete">-->
<!--                        <span class="glyphicon glyphicon-trash"></span>-->
<!--                    </a>-->
<!--                </td>-->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="clearfix"></div>
