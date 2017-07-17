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
	$query = "SELECT * FROM college_master WHERE collegeid = '".$_SESSION['college']."'";
	$college = $db->select($query);
	$row = $college->fetch_assoc();
	$course = $row['type'];
	$query2 = "SELECT * FROM college_type WHERE id = '".$course."'";
	$result = $db->select($query2);
	$type = $result->fetch_assoc();

?>


<?php if(isset($_GET["msg"])) : ?>
  				
 	<div class="alert alert-success"><center><?php  echo htmlentities($_GET["msg"]); ?></center></div>

<?php endif; ?>
<div class="container">
	<div class="row body">
		<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white)">
		<div class="blog-post">
			<h2 class="blog-post-title" style="text-decoration: none;"><?php echo $row["name"]; ?></h2>
			<div style="float: right;"><a href="edit-profile.php" class="btn btn-primary">Edit Your Profile</a></div>
			<br><br>
			<h3>Description : </h3>
			<p><?php echo $row["description"]; ?></p>
			<br>
			<table class="table">
				<tr><th>College Type : </th><th><?php echo $type["type"]; ?></th></tr>
				<tr><th>College Id : </th><th><?php echo $row["collegeid"]; ?></th></tr>
				<tr><th>Address : </th><th><?php echo $row["address"]; ?></th></tr>
				<tr><th>Phone no : </th><th><?php echo $row["phone"]; ?></th></tr>
				<tr><th>Website : </th><th><a href="http://<?php echo $row["website"]; ?>"><?php echo $row["website"]; ?></a></th></tr>
				<tr><th>Email : </th><th><?php echo $row["email"]; ?></th></tr>
			</table>
		</div>
		</div>
	</div>
</div>


<?php include('includes/footer.php'); ?>