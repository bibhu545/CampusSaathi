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
	$db = new Database();
	$query = "SELECT * FROM college_master WHERE id = '".$id."'";
	$college = $db->select($query);
	$row = $college->fetch_assoc() ;

?>

<div class="container">
	<div class="row body">
		<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white)">
		<div class="blog-post">
			<h2 class="blog-post-title" style="text-decoration: none;"><?php echo $row["name"]; ?></h2>
			<div style="float: right;">
				<a href="request-to-college.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Request for Recritment</a>
			</div>
			<br><br>
			<h3>Description : </h3>
			<p><?php echo $row["description"]; ?></p>
			<br>
			<table class="table">
				<tr><th>College Type : </th><th><?php echo $row["type"]; ?></th></tr>
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

<?php include("includes/footer.php") ?>