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
	All Drivers
	<span class="pull-right">
	</span>
	</h1>
	<div class="padding15 nlp nrp">
		<a href="add-driver.php" class="btn btn-primary">Add new Driver</a>
	</div>
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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Hitesh</td>
				<td>GJ20RR56GG</td>
				<td>1234567890</td>
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
				<td>Hitesh</td>
				<td>GJ20RR56GG</td>
				<td>1234567890</td>
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
				<td>Nandish</td>
				<td>GJ20RR56GG</td>
				<td>1234567890</td>
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
				<td>Chirag</td>
				<td>GJ20RR56GG</td>
				<td>1234567890</td>
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