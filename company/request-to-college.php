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
	$query = "SELECT * FROM college_master WHERE id = '".$id."'";
	$college = $db->select($query);
	$row = $college->fetch_assoc();

?>

<?php 

	if(isset($_REQUEST['submit']))
	{
		$collegeid = $row['collegeid'];
		$companyid = mysqli_real_escape_string($db->link,$_REQUEST['companyid']);
		$message = mysqli_real_escape_string($db->link,$_REQUEST['message']);

		$query = "INSERT INTO request_to_college(companyid,collegeid,message,status) VALUES('$companyid','$collegeid','$message','pending')";

		$row = mysqli_query($db->link,$query);

		header('location:index.php?msg=Request Sent');

	}

?>
<div class="container">
		<div class="row body" >
			<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white);">
				<h2 class="blog-header" style="font-family: Georgia,'Times New Roman',Times, serif;">
					Invaite <?php echo $row['name']; ?> to your college
				</h2>
				<form method="post">
					<div class="form-group">
						<label>College Id : </label>
						<input type="text" name="title" class="form-control" disabled="disabled" value="<?php echo $row['name']; ?>">
					</div>
					<div class="form-group">
						<label>Company Id : </label>
						<input type="text" name="companyid" placeholder="Enter Company Id" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label>Leave a message : </label>
						<textarea name="message" placeholder="Leave a request message" class="form-control" required="required"></textarea>
					</div>
					<br>
					<div>
						<input type="submit" name="submit" value="Send Request" class="btn btn-primary">
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php" class="btn btn-default">Cancel</a>
					</div>
				</form>
			</div>
		</div>
</div>
<?php include('includes/footer.php'); ?>