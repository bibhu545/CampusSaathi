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
	
	$query = "SELECT * FROM company_master WHERE companyid = '".$_SESSION['company']."'";
	$company = $db->select($query);
	$row = $company->fetch_assoc() ;
	
	$sector = $row['type'];
	$query2 = "SELECT * FROM company_type WHERE id = '".$sector."'";
	$result = $db->select($query2);
	$type = $result->fetch_assoc();
	
?>


<?php if(isset($_GET["msg"])) : ?>
  				
 	<div class="alert alert-success"><center><?php  echo htmlentities($_GET["msg"]); ?></center></div>

<?php endif; ?>
<div class="container">
	<div class="row body">
		<div class="col-xs-12 body-middle" style="background: linear-gradient(#E6E6E6,white)">
		<div class="blog-post">
			<h2 class="blog-post-title" style="text-decoration: none;"><?php echo $row["name"]; ?></h2>
			<div style="float: right;"><a href="edit-profile.php" class="btn btn-primary">Edit Your Profile</a></div>
			<br><br>
			<h3>Description : </h3>
			<p><?php echo $row["description"]; ?></p>
			<br>
			<table class="table">
				<tr><th>Sector : </th><th><?php echo $type["type"]; ?></th></tr>
				<tr><th>Company id : </th><th><?php echo $row["companyid"]; ?></th></tr>
				<tr><th>Headqurters : </th><th><?php echo $row["headquarter"]; ?></th></tr>
				<tr><th>License Number : </th><th><?php echo $row["licenseno"]; ?></th></tr>
				<tr><th>Website : </th><th><a href="http://<?php echo $row["website"]; ?>"><?php echo $row["website"]; ?></a></th></tr>
				<tr><th>Wikipedia : </th><th><a href="http://<?php echo $row["wikipedia"]; ?>"><?php echo $row["wikipedia"]; ?></a></th></tr>
				<tr><th>Email : </th><th><?php echo $row["email"]; ?></th></tr>
			</table>
		</div>
		</div>
	</div>
</div>


<?php include('includes/footer.php'); ?>