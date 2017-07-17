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
	
	$id = $_GET['id'];

?>
<?php
	
	$db = new Database();
	$query = "SELECT * FROM request_to_company WHERE id = '".$id."'";
	$company = $db->select($query);
	$row = $company->fetch_assoc();
	// echo $_SESSION['company'];

?>

<?php 

	if(isset($_REQUEST['submit']))
	{
		$message = mysqli_real_escape_string($db->link,$_REQUEST['message']);
		$status = "accepted";
		$date = date("Y-m-d h:i:sa");

		$query = "UPDATE request_to_company SET
					status = '$status',
					reply = '$message',
					replydate = '$date' WHERE id = '".$id."'";

		$row = mysqli_query($db->link,$query);

		header('location:index.php?msg=Reply Sent');
	}

?>
<div class="container">
		<div class="row body" >
			<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white);">
				<h2 class="blog-header" style="font-family: Georgia,'Times New Roman',Times, serif;">
					Reply to <?php echo $row['collegeid']; ?> 
				</h2>
				<form method="post">
					<div class="form-group">
						<label>College Id : </label>
						<input type="text" name="title" class="form-control" disabled="disabled" value="<?php echo $row['collegeid']; ?>">
					</div>
					<div class="form-group">
						<label>Company Id : </label>
						<input type="text" name="companyid" value="<?php echo $_SESSION['company']; ?>" class="form-control" disabled="disabled">
					</div>
					<div class="form-group">
						<label>Reply message : </label>
						<textarea name="message" placeholder="Leave a Reply message" class="form-control" required="required"></textarea>
					</div>
					<br>
					<div>
						<input type="submit" name="submit" value="Reply Now" class="btn btn-primary">
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php" class="btn btn-default">Cancel</a>
					</div>
				</form>
			</div>
		</div>
</div>
<?php include('includes/footer.php'); ?>