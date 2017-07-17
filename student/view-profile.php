<?php include('../includes/Database.php'); ?>
<?php 

	session_start();
	if(empty($_SESSION))
	{
		header('location:index.php'); 
	}
	else
	{
		include('includes/login-header.php');
	}

?>
<?php

	$db = new Database();
	$query = "SELECT * FROM student_master WHERE email = '".$_SESSION['student']."'";
	$student = $db->select($query);
	$row = $student->fetch_assoc() ;
	$course = $row['course'];
	$query2 = "SELECT * FROM college_type WHERE id = '".$course."'";
	$result = $db->select($query2);
	$type = $result->fetch_assoc();

?>
<?php if(isset($_GET["msg"])) : ?>
  				
 	<div class="alert alert-success"><center><br><br><?php  echo htmlentities($_GET["msg"]); ?></center></div>

<?php endif; ?>
<div class="container">
	<div class="row body">
		<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white);padding-top: 50px;">
		<div class="blog-post">
			<div style="float: right;"><a href="edit-profile.php" class="btn btn-primary">Edit Your Profile</a></div>
			<br><br>

			<h3>Name : <?php echo $row["name"]; ?></h3>
			
			<br>
			<center><h4>Details</h4></center>
			<table class="table">
				<tr><th>Student Id : </th><th><?php echo $row["id"]; ?></th></tr>
				<tr><th>College Name : </th><th><?php echo $row["college"]; ?></th></tr>
				<tr><th>Course : </th><th><?php echo $type["type"]; ?></th></tr>
				<tr><th>Skills : </th><th><?php echo $row["skills"]; ?></th></tr>
				<tr><th>Passing Year : </th><th><?php echo $row["batch"]; ?></th></tr>
				<tr><th>Github : </th><th><a href="http://<?php echo $row["github"]; ?>"><?php echo $row["github"]; ?></a></th></tr>
				<tr><th>Email : </th><th><?php echo $row["email"]; ?></th></tr>
			</table>
		</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php'); ?>