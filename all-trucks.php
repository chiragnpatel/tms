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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Truck1</td>
				<td>123456</td>
				<td>
					<a href="#" class="btn btn-sm btn-success rounded" title="View">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
					<a href="#" class="btn btn-sm btn-primary rounded" title="Edit">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" class="btn btn-sm btn-danger " title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Truck2</td>
				<td>123456</td>
				<td>
					<a href="#" class="btn btn-sm btn-success rounded" title="View">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
					<a href="#" class="btn btn-sm btn-primary rounded" title="Edit">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" class="btn btn-sm btn-danger " title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Truck3</td>
				<td>123456</td>
				<td>
					<a href="#" class="btn btn-sm btn-success rounded" title="View">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
					<a href="#" class="btn btn-sm btn-primary rounded" title="Edit">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" class="btn btn-sm btn-danger " title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Truck4</td>
				<td>123456</td>
				<td>
					<a href="#" class="btn btn-sm btn-success rounded" title="View">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
					<a href="#" class="btn btn-sm btn-primary rounded" title="Edit">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="#" class="btn btn-sm btn-danger " title="Delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="clearfix"></div>