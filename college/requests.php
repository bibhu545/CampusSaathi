<?php include('../includes/Database.php'); ?>
<?php 

	session_start();
	if(empty($_SESSION))
	{
		include('includes/header.php'); 
	}
	else
	{
		include('includes/login-header.php');
	}

?>
<?php

	$db = new Database();
	$query = "SELECT * FROM request_to_college WHERE collegeid='".$_SESSION['college']."' and status = 'pending'";
	$row = $db->select($query);
	// print_r($pending);
	$query = "SELECT * FROM request_to_college WHERE collegeid='".$_SESSION['college']."' and status != 'pending'";
	$result = $db->select($query);

?>
<style type="text/css">
	.pending{
		height: 100%;
		padding-top: 50px;
		background-color: linear-gradient(lightblue,white);
	}
</style>
<script type="text/javascript">
	 $(document).ready(function() { 

  			 $('.rejectbtn').click(function() {
      				var did = $(this).attr('data-id');
      				$.ajax({
      					type:'post',
      					url : 'reject-company.php',
      					data:{"did":did},
      					success:function(res)
      					{
      						 alert(res);
      						location.reload();
      					}
      				});
      		});

 		});
</script>
<div class="container">
	<div class="row">
		<div class="col-xs-12 pending">
			<center><h2>Requests and Responses</h2></center>
			<table class="table table-striped">
				<tr>
					<th>College Id</th>
					<th colspan="2">Message</th>
					<th>On Dated</th>
					<th>Action</th>
				</tr>
			<?php while($pending = $row->fetch_assoc()): ?>
				<tr>
					<th><?php echo $pending['collegeid'] ?></th>
					<th colspan="2"><?php echo $pending['message'] ?></th>
					<th><?php echo $pending['requestdate'] ?></th>
					<th>
						<input type="submit" name="reject" value="Reject" class="btn btn-danger rejectbtn" data-id="<?php echo $pending['id'] ?>"><br><br>
						<a href="reply-company.php?id=<?php echo $pending['id']; ?>" class="btn btn-primary">Reply</a>
					</th>
				</tr>
			<?php endwhile; ?>
			</table>
			<br><br>
			<center><h2>History</h2></center>
			<table class="table table-striped">
				<tr>
					<th>College Id</th>
					<th colspan="2">Message</th>
					<th>On Dated</th>
					<th>Status</th>
				</tr>
			<?php while($history = $result->fetch_assoc()): ?>
				<tr>
					<th><?php echo $history['collegeid'] ?></th>
					<th colspan="2"><?php echo $history['message'] ?></th>
					<th><?php echo $history['requestdate'] ?></th>
					<th><?php echo $history['status'] ?></th>
				</tr>
			<?php endwhile; ?>
			</table>

		</div>
	</div>
</div>

<?php include('includes/footer.php') ?>