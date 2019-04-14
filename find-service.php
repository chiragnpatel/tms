<?php
require_once './config.php';
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: login.php');
}
if ($_SESSION['user']['role'] != 'customer') {
    header('Location: login.php');
}
include './header.php';
?>
<div class="page-header">
    <h1>
        Find Service
        <span class="pull-right">
	</span>
    </h1>
    <div class="padding15 nlp nrp">
        <div class="row">
            <div class="col-md-5 col-sm-4 padding10">
                <input type="text" name="from_search"  class="form-control" placeholder="From" />
            </div>
            <div class="col-md-5 col-sm-4 padding10">
                <input type="text" name="to_search"  class="form-control" placeholder="To" />
            </div>
            <div class="col-md-2 col-sm-4 padding10">
                <button class="btn btn-primary btn-block">Search</button>
            </div>
        </div>
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
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Truck1</td>
                <td>123456</td>
                <td>Driver1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Truck2</td>
                <td>789456</td>
                <td>Driver2</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Truck3</td>
                <td>111213</td>
                <td>Driver3</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Truck4</td>
                <td>111213</td>
                <td>Driver4</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Truck5</td>
                <td>111213</td>
                <td>Driver5</td>
            </tr>

        </tbody>
    </table>
</div>
<div class="clearfix"></div>
