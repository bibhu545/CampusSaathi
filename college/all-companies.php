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

	$query1 = "SELECT * FROM company_master WHERE type = 1";// as t1 left join company_type as t2 on t1.type=t2.id";
	$row1= $db->select($query1);

	$query2 = "SELECT * FROM company_master WHERE type = 2";// as t1 left join company_type as t2 on t1.type=t2.id";
	$row2= $db->select($query2);

	$query3 = "SELECT * FROM company_master WHERE type = 3";// as t1 left join company_type as t2 on t1.type=t2.id";
	$row3= $db->select($query3);

	$query4 = "SELECT * FROM company_master WHERE type = 4";// as t1 left join company_type as t2 on t1.type=t2.id";
	$row4= $db->select($query4);


?>

<div class="container-fluid">
<div class="row">
	<div class="col-xs-3 body-left-company"></div>
	<div class="col-xs-6 body-middle-company">
		<br><br>
			<center><h3>All Companies on Campusaathi</h3></center><br>
		<div class="list-group related">
				
		<?php while($company1 = $row1->fetch_assoc()): ?>

			<a href="companydetails.php?id=<?php echo $company1['id']; ?>" class="list-group-item college-list"><?php echo $company1['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-company-types.php?type=1" class="btn btn-primary">See All Private Sectors</a></center>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($company2 = $row2->fetch_assoc()): ?>

			<a href="companydetails.php?id=<?php echo $company2['id']; ?>" class="list-group-item college-list"><?php echo $company2['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-company-types.php?type=2" class="btn btn-primary">See All Public Sectors</a></center>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($company3 = $row3->fetch_assoc()): ?>

			<a href="companydetails.php?id=<?php echo $company3['id']; ?>" class="list-group-item college-list"><?php echo $company3['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-company-types.php?type=3" class="btn btn-primary">See All Semi Govt. Sectors</a>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($company4 = $row4->fetch_assoc()): ?>

			<a href="companydetails.php?id=<?php echo $company4['id']; ?>" class="list-group-item college-list"><?php echo $company4['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-company-types.php?type=4" class="btn btn-primary">See All International Sectors</a></center>
		</div>
		<br><br>
	</div>
	<div class="col-xs-3 body-left-company"></div>
</div>
</div>

<?php include("includes/footer.php") ?>