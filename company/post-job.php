<?php include('../includes/Database.php'); ?>
<?php include('includes/login-header.php'); ?>

<?php

	session_start();
	if(!$_SESSION['company'])
	{
		header('Location:index.php');
	}
	else
	{
		$db = new Database();
		if(isset($_REQUEST['submit']))
		{
			$companyid = $_SESSION['company'];
			$title = $_REQUEST['title'];
			$description = $_REQUEST['description'];
			$eligibility = $_REQUEST['eligibility'];
			$exp = $_REQUEST['exp'];
			$type = $_REQUEST['type'];
			$salary = $_REQUEST['salary'];
			$place = $_REQUEST['place'];
			$vacancy = $_REQUEST['vacancy'];
			$website = $_REQUEST['website'];
			//$date =date('Y-m-d',strtotime($_REQUEST['date']));
			$date =$_REQUEST['date'];


			$sql="INSERT INTO jobs (companyid,title,description,eligibility,experience,salary,place,type,website,vacancy,lastdate) VALUES ('$companyid','$title','$description','$eligibility','$exp','$salary','$place','$type','$website','$vacancy','$date') ";

			$row=mysqli_query($db->link,$sql);
			// echo $sql;
		}
	 }

?>
<?php
	
	$query1 = "SELECT * FROM job_types";

	$row1 = $db->select($query1);	

	$query2 = "SELECT * FROM experience";

	$row2 = $db->select($query2);

	$query3 = "SELECT * FROM location";

	$row3 = $db->select($query3);

?>
	<div class="container">
		<div class="row body">
			<div class="col-xs-12 body-middle">
				<h2 class="blog-header" style="font-family: Georgia,'Times New Roman',Times, serif;">Post a new job and attract candidates</h2>
				<form method="post">
					<div class="form-group">
						<label>Job Title : </label>
						<input type="text" name="title" placeholder="Enter Job Title" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label>Job Description : </label>
						<textarea name="description" placeholder="Enter Job Description" class="form-control" required="required"></textarea>
					</div>
					<div class="form-group">
						<label>Eligibility : </label>
						<input type="text" name="eligibility" placeholder="Enter Job Eligibility (skills/requirements)" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label>Experience : </label>
						<select class="form-control" name="exp">
							<?php
								$result2=mysqli_fetch_all($row2,MYSQLI_ASSOC);
								foreach($result2 as $k2)
								{
									echo "<option value='".$k2["id"]."'>".$k2["experience"]."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Job Type : </label>
						<select class="form-control" name="type">
							<?php
								$result1=mysqli_fetch_all($row1,MYSQLI_ASSOC);
								foreach($result1 as $k1)
								{
									echo "<option value='".$k1["id"]."'>".$k1["type"]."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Salary : </label>
						<input type="text" name="salary" placeholder="Enter minimum Salary" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label>Location : </label>
						<select class="form-control" name="place">
							<?php
								$result3=mysqli_fetch_all($row3,MYSQLI_ASSOC);
								foreach($result3 as $k3)
								{
									echo "<option value='".$k3["id"]."'>".$k3["location"]."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Vacancy : </label>
						<input type="text" name="vacancy" placeholder="Enter number of positions" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label>Apply link : </label>
						<input type="text" name="website" placeholder="Enter application link" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label>Last Date : </label>
						<input type="date" name="date" placeholder="Enter Last date of apply" class="form-control" required="required">
					</div>
					<br>
					<div>
						<input type="submit" name="submit" value="Post Job" class="btn btn-primary">
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php" class="btn btn-default">Cancel</a>
						<a href="post-internship.php" class="btn btn-success" style="margin-left: 520px;">Want to post an internship ?</a>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php include 'includes/footer.php'; ?>