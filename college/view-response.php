<?php include('../includes/Database.php'); ?>
<?php 

	session_start();
	if(empty($_SESSION))
	{
		header('location:login.php?login=You need to Login or Sign Up');
	}
	else
	{
		include('includes/login-header.php');
	}

?>
<?php

	$db = new Database();
	$query = "SELECT * FROM request_to_company WHERE collegeid='".$_SESSION['college']."' and status = 'pending'";
	$row = $db->select($query);
	// print_r($pending);
	$query = "SELECT * FROM request_to_company WHERE collegeid='".$_SESSION['college']."' and status != 'pending'";
	$result = $db->select($query);

?>
<style type="text/css">
	.pending{
		height: 100%;
		padding-top: 50px;
		background-color: linear-gradient(lightblue,white);
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-12 pending">
			<center><h2>Pending Requests</h2></center>
			<table class="table table-striped">
				<tr>
					<th>College Id</th>
					<th colspan="2">Message</th>
					<th>Company Id#</th>
					<th>On Dated</th>
				</tr>
			<?php while($pending = $row->fetch_assoc()): ?>
				<tr>
					<th><?php echo $pending['collegeid'] ?></th>
					<th colspan="2"><?php echo $pending['message'] ?></th>
					<th><?php echo $pending['companyid'] ?></th>
					<th><?php echo $pending['requestdate'] ?></th>
				</tr>
			<?php endwhile; ?>
			</table>
			<br><br>
			<center><h2>Responsed Requests</h2></center>
			<table class="table table-striped">
				<tr>
					<th>College Id</th>
					<th colspan="2">Message</th>
					<th>On Dated</th>
					<th>Company Id</th>
					<th colspan="2">Reply</th>
					<th>Status</th>
				</tr>
			<?php while($history = $result->fetch_assoc()): ?>
				<tr>
					<th><?php echo $history['collegeid'] ?></th>
					<th colspan="2"><?php echo $history['message'] ?></th>
					<th><?php echo $history['requestdate'] ?></th>
					<th><?php echo $history['companyid'] ?></th>
					<th colspan="2"><?php echo $history['reply'] ?></th>
					<th><?php echo $history['status'] ?></th>
				</tr>
			<?php endwhile; ?>
			</table>
			<br><br>
		</div>
	</div>
</div>

<?php include('includes/footer.php') ?>