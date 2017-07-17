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
	$query = "SELECT * FROM college_master WHERE collegeid = '".$_SESSION['college']."'";
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
		$collegeid = mysqli_real_escape_string($db->link,$_REQUEST['collegeid']);
		$email = mysqli_real_escape_string($db->link,$_REQUEST['email']);
		$type = mysqli_real_escape_string($db->link,$_REQUEST['type']);
		$description = mysqli_real_escape_string($db->link,$_REQUEST['description']);
		$address = mysqli_real_escape_string($db->link,$_REQUEST['address']);
		$phone = mysqli_real_escape_string($db->link,$_REQUEST['phone']);
		$website = mysqli_real_escape_string($db->link,$_REQUEST['website']);

		$query ="UPDATE college_master SET 
					name = '$name',
					collegeid = '$collegeid',
					email = '$email',
					description = '$description',
					address = '$address',
					phone = '$phone',
					website = '$website',
					type = '$type' WHERE collegeid = '".$_SESSION['college']."'";

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
					<label class="control-label col-sm-3">College Id :</label>
					<div class="col-sm-9">
						<input type="text" name="collegeid" class="form-control" value="<?php echo $row['collegeid'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Description:</label>
					<div class="col-sm-9">
					<textarea name="description" class="form-control" placeholder="Say something about your College" style="height: 300px;" required="required"><?php echo $row['description'] ?>
								
					</textarea>
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
					<label class="control-label col-sm-3">Address:</label>
					<div class="col-sm-9">
						<textarea name="address" class="form-control" placeholder="Enter college address"><?php echo $row['address'] ?>
							
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Phone no:</label>
					<div class="col-sm-9">
						<input type="text" name="phone" class="form-control" placeholder="Enter Enquiry number" value="<?php echo $row['phone'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">College-Email :</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter Corporate-Email" value="<?php echo $row['email'] ?>" required="required">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3">Website : </label>
					<div class="col-sm-9">
						<input type="text" name="website" class="form-control" placeholder="Give your web Identity" value="<?php echo $row['website'] ?>" required="required">
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