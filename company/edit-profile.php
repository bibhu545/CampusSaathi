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
?>
<?php
	
	$query = "SELECT * FROM company_type";
	$row1 = $db->select($query);	

?>
<?php 

	if(isset($_REQUEST["update"]))
	{
		$name = mysqli_real_escape_string($db->link,$_REQUEST['name']);
		$companyid = mysqli_real_escape_string($db->link,$_REQUEST['companyid']);
		$email = mysqli_real_escape_string($db->link,$_REQUEST['email']);
		$type = mysqli_real_escape_string($db->link,$_REQUEST['type']);
		$description = mysqli_real_escape_string($db->link,$_REQUEST['description']);
		$license = mysqli_real_escape_string($db->link,$_REQUEST['license']);
		$website = mysqli_real_escape_string($db->link,$_REQUEST['website']);

		$query ="UPDATE company_master SET 
					name = '$name',
					companyid = '$companyid',
					email = '$email',
					description = '$description',
					licenseno = '$license',
					website = '$website',
					type = '$type' WHERE companyid = '".$_SESSION['company']."'";
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
						<input type="text" name="name" class="form-control" placeholder="Enter company name" value="<?php echo $row['name'] ?>" required="required" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Company Id :</label>
					<div class="col-sm-9">
						<input type="text" name="companyid" class="form-control" placeholder="Enter Company Id" value="<?php echo $row['companyid'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Description:</label>
					<div class="col-sm-9">
					<textarea name="description" class="form-control" placeholder="Say something about your company" style="height: 300px;" required="required">
						<?php echo $row['description'] ?>		
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
					<label class="control-label col-sm-3">Headquarters : </label>
					<div class="col-sm-9">
						<input type="text" name="website" class="form-control" placeholder="Give your web Identity" value="<?php echo $row['headquarter'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Licence no :</label>
					<div class="col-sm-9">
						<input type="text" name="license" class="form-control" placeholder="Enter Licence/business permit no" value="<?php echo $row['licenseno'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Corporate-Email :</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter Corporate-Email" value="<?php echo $row['email'] ?>" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Wikipedia : </label>
					<div class="col-sm-9">
						<input type="text" name="website" class="form-control" placeholder="Give your web Identity" value="<?php echo $row['wikipedia'] ?>" required="required">
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