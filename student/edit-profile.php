<?php include('../includes/Database.php'); ?>
<?php 

	session_start();
	if(empty($_SESSION))
	{
		header("location:index.php"); 
	}
	else
	{
		include('includes/login-header.php');
	}

?>
<?php

	$db = new Database();
	$query = "SELECT * FROM student_master WHERE email = '".$_SESSION['student']."'";
	$college = $db->select($query);
	$row = $college->fetch_assoc() ;
?>
<?php
	
	$query = "SELECT * FROM college_type";
	$row1 = $db->select($query);	

?>
<?php 

	if(isset($_REQUEST["update"]))
	{
		$name = mysqli_real_escape_string($db->link,$_REQUEST['name']);
		$college = mysqli_real_escape_string($db->link,$_REQUEST['college']);
		$email = mysqli_real_escape_string($db->link,$_REQUEST['email']);
		$type = mysqli_real_escape_string($db->link,$_REQUEST['type']);
		$skills = mysqli_real_escape_string($db->link,$_REQUEST['skills']);
		$github = mysqli_real_escape_string($db->link,$_REQUEST['github']);
		$batch = mysqli_real_escape_string($db->link,$_REQUEST['batch']);
		

		$query ="UPDATE student_master SET 
					name = '$name',
					college = '$college',
					course = '$type',
					batch = '$batch',
					email = '$email',
					github = '$github',
					skills = '$skills' WHERE email = '".$_SESSION['student']."'";

		$update_row = $db->link->query($query) or die($db->link->error.__LINE__);
		header('location:view-profile.php?msg='.urldecode("Profile Updated"));
	}

?>
<div class="container-fluid">
	<div class="row body">
		<div class="col-xs-2"></div>

		<div class="col-xs-8 middle" style="background: linear-gradient(lightblue,white,lightblue);">
		<br><br>
			<center>
				<h3>Update Your Profile</h3><br>
			</center>
			<form class="form-horizontal" method="POST">

				<div class="form-group">
					<label class="control-label col-sm-3">Name :</label>
					<div class="col-sm-9">
						<input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" required="required" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">College :</label>
					<div class="col-sm-9">
						<input type="text" name="college" class="form-control" value="<?php echo $row['college'] ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3">Type :</label>
					<div class="col-sm-9">
						<select class="form-control" name="type">
							<?php
								$result=mysqli_fetch_all($row1,MYSQLI_ASSOC);
								foreach($result as $k)
								{
									echo "<option value='".$k["id"]."'>".$k["type"]."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Batch :</label>
					<div class="col-sm-9">
						<input type="text" name="batch" class="form-control" value="<?php echo $row['batch'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Skills :</label>
					<div class="col-sm-9">
						<input type="text" name="skills" class="form-control" value="<?php echo $row['skills'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Email :</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email'] ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3">Github : </label>
					<div class="col-sm-9">
						<input type="text" name="github" class="form-control" value="<?php echo $row['github'] ?>" required="required">
					</div>
				</div>

				  <div class="form-group"> 
				      <center>
				      <br>
				      	<input type="submit" class="btn btn-primary buttons" value="Update Information" name="update">
				      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    	<a href="index.php" class="btn btn-default">Cancel</a>
				      </center>
				  </div>
			</form>
		</div>
		<div class="col-xs-2"></div>
	</div>
</div>

<?php  include 'includes/footer.php'; ?>