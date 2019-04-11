<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}
include './header.php';

if (isset($_POST['submit'])) {
    $driver_name = $_POST['driver_name'];
    $gender= $_POST['gender'] ;
    $driver_age = $_POST['driver_age'];
    $driver_licence_number = $_POST['driver_licence_number'];
    $driver_home_address = $_POST['driver_home_address'];
    $driver_mobile_number = $_POST['driver_mobile_number'];
    $created_at = date('Y-m-d H:i:s');
    $transport_company_id = $_SESSION['user']['id'];
//    var_dump($driver_age,$gender,$driver_home_address,$driver_licence_number,$driver_mobile_number,$driver_name); die;
    $sql = "INSERT INTO `drivers` (`driver_name`, `gender`, `driver_age`,`driver_licence_number`,`driver_home_address`,`driver_mobile_number`, `created_at`, `transport_company_id`) VALUES " .
        "( :driver_name, :gender, :driver_age, :driver_licence_number, :driver_home_address, :driver_mobile_number, :created_at, :transport_company_id)";
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":driver_name", $driver_name);
    $stmt->bindValue(":gender", $gender);
    $stmt->bindValue(":driver_age", $driver_age);
    $stmt->bindValue(":driver_licence_number", $driver_licence_number);
    $stmt->bindValue(":driver_home_address", $driver_home_address);
    $stmt->bindValue(":driver_mobile_number", $driver_mobile_number);
    $stmt->bindValue(":created_at", $created_at);
    $stmt->bindValue(":transport_company_id", $transport_company_id);
    $stmt->execute();

    header("Location: all-drivers.php");
}


?>
<form method="post" action="#">
    <div class="form-group">
        <label>Driver Full Name</label>
        <input name="driver_name" type="text" class="form-control" placeholder="Enter Driver Full Name">
    </div>
    <div class="form-group">
        <label>Gender</label>
        <select name="gender" class="form-control" id="exampleFormControlSelect1">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label>Driver Age</label>
        <input name="driver_age" type="text" class="form-control" placeholder="Enter Driver Age">
    </div>
    <div class="form-group">
        <label>Driver Licence Number</label>
        <input name="driver_licence_number" type="text" class="form-control" placeholder="Enter Licence Number">
    </div>
    <div class="form-group">
        <label>Driver Home Address</label>
        <input name="driver_home_address" type="text" class="form-control" placeholder="Enter Driver Home Address">
    </div>
    <div class="form-group">
        <label>Driver Mobile Number</label>
        <input type="text" name="driver_mobile_number" class="form-control" placeholder="Enter Driver Mobile Number">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
