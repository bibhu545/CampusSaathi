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
	
	$type = $_GET['type'];
	$db = new Database();

	$query1 = "SELECT * FROM college_master WHERE type = '$type'";// as t1 left join company_type as t2 on t1.type=t2.id";
	$row1= $db->select($query1);

	$query2 = "SELECT * FROM college_type WHERE id ='".$type."'";
	$row2 = $db->select($query2);
	$college_type = $row2->fetch_assoc();
	// print_r($college_type);

?>

<div class="container-fluid">
<div class="row">
	<div class="col-xs-3 body-left-company"></div>
	<div class="col-xs-6 body-middle-company">
		<br><br>
		<center><h2 style="font-family: Georgia,'Times New Roman',Times, serif;">See all <?php echo $college_type['type']; ?> Colleges</h2><br></center>
		<div class="list-group related">
				
		<?php while($college1 = $row1->fetch_assoc()): ?>

			<a href="collegedetails.php?id=<?php echo $college1['id']; ?>" class="list-group-item college-list"><?php echo $college1['name']; ?></a>
		<?php endwhile; ?>
		<br>
		</div>
	</div>
	<div class="col-xs-3 body-left-company"></div>
</div>
</div>

<?php include("includes/footer.php") ?>