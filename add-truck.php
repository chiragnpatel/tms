<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}

$transport_company_id = $_SESSION['user']['id'];
if (isset($_POST['submit'])) {
    $truck_name = $_POST['truck_name'];
    $truck_number = $_POST['truck_number'];
    $rto_number = $_POST['rto_number'];
    $driver_id = $_POST['driver_id'];
    $created_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `trucks` (`truck_name`, `rto_number`,`driver_id`,`created_at`,`transport_company_id`) VALUES " .
        "( :truck_name, :rto_number, :driver_id, :created_at, :transport_company_id)";
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":truck_name", $truck_name);
    $stmt->bindValue(":rto_number", $rto_number);
    $stmt->bindValue(":driver_id", $driver_id);
    $stmt->bindValue(":created_at", $created_at);
    $stmt->bindValue(":transport_company_id", $transport_company_id);
    $stmt->execute();

    header("Location: all-trucks.php");
}
$drivers = "SELECT * FROM drivers where transport_company_id = :transport_company_id  AND deleted_at is null";
$stmt = $DB->prepare($drivers);
$stmt->bindValue(":transport_company_id", $transport_company_id);
$stmt->execute();
$result = $stmt->fetchAll();

include './header.php';
?>
<form method="post">
    <div class="form-group">
        <label>Truck Model Name</label>
        <input name="truck_name" type="text" class="form-control" placeholder="Enter Truck Model Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">RTO Registration Number</label>
        <input type="text" name="rto_number" class="form-control" placeholder="RTO registration number">
    </div>
    <div class="form-group">
        <label>Select Driver for it</label>

        <select name="driver_id" class="form-control">
            <?php foreach ($result as $data) : ?>
                <option value="<?php echo $data['id']; ?>"><?php echo $data['driver_name']; ?></option>
            <?php endforeach; ?>
        </select>

    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
