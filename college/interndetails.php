<?php include('../includes/Database.php'); ?>

<?php
		
	$id = $_GET['id'];
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
	$query = "SELECT * FROM internships WHERE id = '".$id."'";
	$job = $db->select($query);
	$row = $job->fetch_assoc() ;

	$companyid = $row['companyid'];
	$place = $row['place'];
	$jobtype = $row['type'];
	// echo $companyid;
	$query2 = "SELECT * FROM company_master WHERE companyid = '".$companyid."'";
	$row2 = $db->select($query2);
	$company = $row2->fetch_assoc();

	$query3 = "SELECT * FROM job_types WHERE id = '".$jobtype."'";
	$row3 = $db->select($query3);
	$job_types = $row3->fetch_assoc();

	$query4 = "SELECT * FROM location WHERE place_id = '".$place."'";
	$row4 = $db->select($query4);
	$location = $row4->fetch_assoc();

?>

<div class="container">
	<div class="row body">
		<div class="col-xs-12 body-middle" style="background: linear-gradient(lightblue,white,lightblue)">
		<div class="blog-post">
			<h2 class="blog-post-title" style="text-decoration: none;"><?php echo $row["title"]; ?></h2>
			<div style="float: right;"><a href="http://<?php echo $row["website"]; ?>" class="btn btn-success">Apply Now</a></div>
			<br><br>
			<h3>Posted By : <?php echo $company["name"]; ?></h3>
			<h3>Description : </h3>
			<p><?php echo $row["description"]; ?></p>
			<br>
			<center><h4>More Details</h4><br></center>
			<table class="table">
				<tr><th>Job Type: </th><th><?php echo $job_types["type"]; ?></th></tr>
				<tr><th>Skills Required: </th><th><?php echo $row["eligibility"]; ?></th></tr>
				<tr><th>Minimum-Salary: </th><th><?php echo $row["salary"]; ?></th></tr>
				<tr><th>Vacancy: </th><th><?php echo $row["vacancy"]; ?> Posts</th></tr>
				<tr><th>Preffered Place: </th><th><?php echo $location["location"]; ?></th></tr>
				<tr><th>Apply Before: </th><th><?php echo $row["lastdate"]; ?></th></tr>
				<tr><th>Link to apply: </th><th><a href="http://<?php echo $row["website"]; ?>"><?php echo $row["website"]; ?></a></th></tr>
			</table>
			<br>
			<center>
			<a href="companydetails.php?id=<?php echo $company["id"]; ?>" class="btn btn-primary">More about the company</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://<?php echo $row["website"]; ?>" class="btn btn-success">Apply Now</a></center>
		</div>
		</div>
	</div>
</div>

<?php include('includes/footer.php'); ?>