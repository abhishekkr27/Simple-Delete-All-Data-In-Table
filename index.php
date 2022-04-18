<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Delete All Data In Table</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-target="#form_modal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add Member</button>
		<button type="button" class="btn btn-danger pull-right" data-target="#modal_confirm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete All</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					$query = mysqli_query($conn, "SELECT * FROM `member` ORDER BY `lastname` ASC") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<tr class="del_mem<?php echo $fetch['mem_id']?>">
					<td><?php echo $fetch['firstname']?></td>
					<td><?php echo $fetch['lastname']?></td>				
					<td><?php echo $fetch['address']?></td>				
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4>Are you sure you want to delete all data?</h4></center>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
					<a type="button" class="btn btn-success" href="delete_members.php">Yes</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save_member.php">
					<div class="modal-header">
						<h3 class="modal-title">Add Member</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" required="required"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>	
</html>