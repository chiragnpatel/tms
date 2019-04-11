<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'transportadmin') {
    header('Location: login.php');
}
include './header.php';
?>
<form method="post">
    <div class="form-group">
        <label>Truck Model Name</label>
        <input name="truck_name" type="text" class="form-control" placeholder="Enter Truck Model Name">
    </div>
    <div class="form-group">
        <label>Truck Number</label>
        <input name="truck_number" type="text" class="form-control" placeholder="Enter Truck Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">RTO Registration Number</label>
        <input type="text" name="rto_number" class="form-control" placeholder="RTO registration number">
    </div>
    <div class="form-group">
        <label>Select Driver for it</label>
        <select name="driver_id" class="form-control" id="exampleFormControlSelect1">
            <option value="">1</option>
            <option value="">2</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
