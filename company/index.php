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

	$query1 = "SELECT * FROM college_master WHERE type = 1";
	$row1= $db->select($query1);

	$query2 = "SELECT * FROM college_master WHERE type = 2";
	$row2 = $db->select($query2);

	$query3 = "SELECT * FROM college_master WHERE type = 3";
	$row3 = $db->select($query3);

	$query4 = "SELECT * FROM college_master WHERE type = 4";
	$row4 = $db->select($query4);

	$query5 = "SELECT * FROM college_master WHERE type = 5";
	$row5 = $db->select($query5);

?>
<?php

	$query = "SELECT COUNT(*) FROM request_to_company WHERE companyid='".$_SESSION['company']."' and status = 'pending'";
	$request = $db->select($query);
	$count = $request->fetch_array();
	//print_r($count);

?>
<?php if(isset($_GET["msg"])) : ?>
  				
  	<center><div class="alert alert-success"><?php  echo htmlentities($_GET["msg"]); ?></div></center>

<?php endif; ?>
<div class="container-fluid">
<div class="row">
	<div class="col-xs-3 body-left-company">
	<center>
		<a href="requests.php" class="btn btn-primary">See Requests &nbsp;&nbsp;<?php echo $count['0']; ?></a>
		<br><br>
		<a href="view-response.php" class="btn btn-primary">View Responses</a>
	</center>
	</div>
	<div class="col-xs-6 body-middle-company">
		<br><br>
		<center><h2 style="font-family: Georgia,'Times New Roman',Times, serif;">See all Colleges</h2><br></center>
		<div class="list-group related">
				
		<?php while($college1 = $row1->fetch_assoc()): ?>

			<a href="collegedetails.php?id=<?php echo $college1['id']; ?>" class="list-group-item college-list"><?php echo $college1['name']; ?></a>
		<?php endwhile; ?>
		<br>

			<center><a href="see-college-type.php?type=1" class="btn btn-primary">See All Engineering Colleges</a></center>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($college2 = $row2->fetch_assoc()): ?>

			<a href="collegedetails.php?id=<?php echo $college2['id']; ?>" class="list-group-item college-list"><?php echo $college2['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-college-type.php?type=2" class="btn btn-primary">See All MBA Colleges</a></center>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($college3 = $row3->fetch_assoc()): ?>

			<a href="collegedetails.php?id=<?php echo $college3['id']; ?>" class="list-group-item college-list"><?php echo $college3['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-college-type.php?type=3" class="btn btn-primary">See All Diploma Colleges</a></center>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($college4 = $row4->fetch_assoc()): ?>

			<a href="collegedetails.php?id=<?php echo $college4['id']; ?>" class="list-group-item college-list"><?php echo $college4['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-college-type.php?type=4" class="btn btn-primary">See All BCA/MCA Colleges</a></center>
		</div>
		<br><br>
		<div class="list-group related">
				
		<?php while($college5 = $row5->fetch_assoc()): ?>

			<a href="collegedetails.php?id=<?php echo $college5['id']; ?>" class="list-group-item college-list"><?php echo $college5['name']; ?></a>
		<?php endwhile; ?>
		<br>
			<center><a href="see-college-type.php?type=5" class="btn btn-primary">See All Universities</a><center>
		</div>
	</div>
	<div class="col-xs-3 body-left-company"></div>
</div>
</div>

<?php include("includes/footer.php") ?>