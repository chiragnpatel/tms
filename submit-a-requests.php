<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}
include './header.php';
$transport_company_id = $_SESSION['user']['id'];

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $transport_admin_id = $transport_company_id;
    $truck_id = $_POST['truck_id'];
    $driver_id = $_POST['driver_id'];
    $contact_number = $_POST['number'];
    $request_time = $_POST['time'];
    $created_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `services` (`from`, `to`,`truck_id`,`transport_admin_id`,`driver_id`, `request_time`,`number`,`created_at`) VALUES " .
        "( :from, :to, :truck_id, :transport_admin_id, :driver_id, :requ    est_time, :contact_number, :created_at)";
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":from", $from);
    $stmt->bindValue(":to", $to);
    $stmt->bindValue(":truck_id", $truck_id);
    $stmt->bindValue(":transport_admin_id", $transport_company_id);
    $stmt->bindValue(":driver_id", $driver_id);
    $stmt->bindValue(":request_time", $request_time);
    $stmt->bindValue(":contact_number", $contact_number);
    $stmt->bindValue(":created_at", $created_at);
    $stmt->execute();

    header("Location: transportadmin-dashboard.php");
}

$drivers = "SELECT * FROM drivers where transport_company_id = :transport_company_id  AND deleted_at is null";
$stmt = $DB->prepare($drivers);
$stmt->bindValue(":transport_company_id", $transport_company_id);
$stmt->execute();
$result = $stmt->fetchAll();


$trucks = "SELECT * FROM trucks where transport_company_id = :transport_company_id  AND deleted_at is null";
$stmt = $DB->prepare($trucks);
$stmt->bindValue(":transport_company_id", $transport_company_id);
$stmt->execute();
$results = $stmt->fetchAll();
?>
<form method="post" action="#">
    <div class="form-group">
        <label>From</label>
        <input name="from" type="text" class="form-control" placeholder="Start Location">
    </div>
    <div class="form-group">
        <label>To</label>
        <input name="to" type="text" class="form-control" placeholder="Destination Location">
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input name="number" type="text" class="form-control" placeholder="Contact Number">
    </div>
    <div class="form-group">
        <label>Select Truck for it</label>
        <select name="truck_id" class="form-control">
            <?php foreach ($results as $data) : ?>
                <option value="<?php echo $data['id']; ?>"><?php echo $data['truck_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Select Driver for it</label>
        <select name="driver_id" class="form-control">
            <?php foreach ($result as $data) : ?>
                <option value="<?php echo $data['id']; ?>"><?php echo $data['driver_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Time</label>
        <input type="text" name="time" class="form-control" placeholder="Time">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

