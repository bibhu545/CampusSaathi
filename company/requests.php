<?php include('../includes/Database.php'); ?>
<?php 

	session_start();
	if(!$_SESSION['company'])
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
	$query = "SELECT * FROM request_to_company WHERE companyid='".$_SESSION['company']."' and status = 'pending'";
	$row = $db->select($query);
	// print_r($pending);
	$query = "SELECT * FROM request_to_company WHERE companyid='".$_SESSION['company']."' and status != 'pending'";
	$result = $db->select($query);

?>

<script type="text/javascript">
	 $(document).ready(function() { 

  			 $('.rejectbtn').click(function() {
      				var did = $(this).attr('data-id');
      				$.ajax({
      					type:'post',
      					url : 'reject-college.php',
      					data:{"did":did},
      					success:function(res)
      					{
      						alert(res);
      						window.location.reload();
      					}
      				});
      		});

 		});
</script>



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
						<input type="submit" name="reject" value="Reject" class="btn btn-danger rejectbtn" data-id="<?php echo $pending['id'] ?>">
						<br><br>
						<a href="reply-college.php?id=<?php echo $pending['id']; ?>" class="btn btn-primary">Reply</a>
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