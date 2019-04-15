<?php
require_once './config.php';
//if (!isset($_SESSION['loggedin']) || !$_SESSION['logsgedin']) {
//    header('Location: login.php');
//}
if ($_SESSION['user']['role'] != 'customer') {
    header('Location: login.php');
}
$query = "select * from services where deleted_at is null ";
$stmt = $DB->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();
include './header.php';
?>
<div class="page-header">
    <h1>
        Find Service
        <span class="pull-right">
	</span>
    </h1>
<!--    <div class="padding15 nlp nrp">-->
<!--        <div class="row">-->
<!--            <div class="col-md-5 col-sm-4 padding10">-->
<!--                <   input type="text" name="from_search"  class="form-control" placeholder="From" />-->
<!--            </div>-->
<!--            <div class="col-md-5 col-sm-4 padding10">-->
<!--                <input type="text" name="to_search"  class="form-control" placeholder="To" />-->
<!--            </div>-->
<!--            <div class="col-md-2 col-sm-4 padding10">-->
<!--                <button class="btn btn-primary btn-block">Search</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
<!-- List-table -->
<div class="padding15 nlp nrp table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Index</th>
            <th>From</th>
            <th>To</th>
            <th>Transport company Name</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($results as $result) :
                $transport_admin_id = $result['transport_admin_id'];
                $query = "select * from tbl_users where id =:transport_admin_id";
                $stmt = $DB->prepare($query);
                $stmt->bindParam(':transport_admin_id', $transport_admin_id);
                $stmt->execute();
                $transportCompany = $stmt->fetch();
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $result['from']; ?></td>
                    <td><?php echo $result['to']; ?></td>
                    <td><?php echo $transportCompany['name']; ?></td>
                    <td><?php echo $result['request_time']; ?></td>
                    <td><a href="view-service.php?id=<?php echo $result['id']; ?>">View Service</a></td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="clearfix"></div>
