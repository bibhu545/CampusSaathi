<?php include('../includes/Database.php'); ?>

<?php
	
	
	$id = $_GET['id'];


?>

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
	$query = "SELECT * FROM company_master WHERE id = '".$id."'";
	$company = $db->select($query);
	$row = $company->fetch_assoc() ;
	$type = $row["type"];
	$query2 = "SELECT * FROM company_type WHERE id = $type";
	$result = $db->select($query2);
	$com_type = $result->fetch_assoc();

?>

<div class="container">
	<div class="row body">
		<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white,lightblue)">
		<div class="blog-post">
			<h2><?php echo $row["name"]; ?>
			<div style="float: right;"><img src="../company/logo/<?php echo $row["logo"]; ?>" height="100px" width="150px"></div></h2>
			
			<!-- <div style="float: right;"> -->
			<!-- <a href="request-to-company.php?id=$id" class="btn btn-primary">Invite this Company</a></div> -->
			<br><br>
			<h3>Description : </h3>
			<p><?php echo $row["description"]; ?></p>
			<br>
			<table class="table">
				<tr><th>Sector : </th><th><?php echo $com_type["type"]; ?></th></tr>
				<tr><th>HeadQuarters : </th><th><?php echo $row["headquarter"]; ?></th></tr>
				<tr><th>Company id : </th><th><?php echo $row["companyid"]; ?></th></tr>
				<tr><th>License Number : </th><th><?php echo $row["licenseno"]; ?></th></tr>
				<tr><th>Wikipedia : </th><th><a href="http://<?php echo $row["wikipedia"]; ?>"><?php echo $row["wikipedia"]; ?></a></th></tr>
				<tr><th>Website : </th><th><a href="http://<?php echo $row["website"]; ?>"><?php echo $row["website"]; ?></a></th></tr>
				<tr><th>Email : </th><th><?php echo $row["email"]; ?></th></tr>
			</table>
			<br>
			<center><a href="request-to-company.php?id=<?php echo $id; ?>" class="btn btn-primary">Invite this Company</a></center>
		</div>
		</div>
	</div>
</div>


<?php include('includes/footer.php'); ?>