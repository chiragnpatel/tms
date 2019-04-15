<?php
require_once './config.php';
$id = $_GET['id'];
if ($_SESSION['user']['role'] != 'customer') {
    header('Location: login.php');
}
$query = "select * from services where id =:id and deleted_at is null ";
$stmt = $DB->prepare($query);
$stmt->bindParam(":id",$id);
$stmt->execute();
$result = $stmt->fetch();

$transport_admin_id = $result['transport_admin_id'];
$query = "select * from tbl_users where id =:transport_admin_id";
$stmt = $DB->prepare($query);
$stmt->bindParam(':transport_admin_id', $transport_admin_id);
$stmt->execute();
$transportCompany = $stmt->fetch();
include './header.php';
?>
<div class="page-header">
    <h1>
        Submit a Request
        <span class="pull-right">
	</span>
    </h1>
    <form method="post" action="#">
        <div class="form-group">
            <label>From</label>
            <input name="from" value="<?php echo $result['from']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>To</label>
            <input name="to" type="text" value="<?php echo $result['to']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Company Name</label>
            <input name="to" type="text" value="<?php echo $transportCompany['name']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input name="to" type="text" value="<?php echo $result['number']; ?>" class="form-control" disabled >
        </div>
<!--        <button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
    </form>
</div>
<div class="clearfix"></div>
