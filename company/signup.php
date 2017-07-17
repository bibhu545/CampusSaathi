<?php include('../includes/Database.php'); ?>
<?php include('includes/header.php'); ?>
<?php
	
	if(isset($_REQUEST["login"]))
	{
		header("location:login.php");
	}

?>

<?php
	$db = new Database();
	if(isset($_REQUEST["signup"]))
	{
		$name = $_REQUEST["name"];
		$companyid = $_REQUEST["companyid"];
		$description = $_REQUEST["description"];
		$head = $_REQUEST["head"];
		$license = $_REQUEST["license"];
		$type = $_REQUEST["type"];
		$email = $_REQUEST["email"];
		$wikipedia = $_REQUEST["wikipedia"];
		$password = $_REQUEST["password"];
		$website = $_REQUEST["website"];
		$logo ="noimg.jpg";
		if(is_uploaded_file($_FILES["logo"]["tmp_name"]))
		{
			$logo = $companyid.".jpg";
			move_uploaded_file($_FILES["logo"]["tmp_name"],"logo/".$companyid.".jpg");
		}
		

		$sql="INSERT INTO company_master (name,companyid,description,type,headquarter,licenseno,email,logo,wikipedia,website,password) VALUES ('$name','$companyid','$description',$type,'$head','$license','$email','".$logo."','$wikipedia','$website','$password') ";

		$row=mysqli_query($db->link,$sql);
		
	}

?>

<?php
	
	$query = "SELECT * FROM company_type";

	$row = $db->select($query);	

?>
<div class="container-fluid">
	<div class="row body">
		<div class="col-xs-3"></div>

		<div class="col-xs-6 middle">

			<center>
				<h2>Sign up and Discover your <strong>FUTURE</strong></h2>
				<br>
				<h4>Join over 2 million students and improve your skills</h4>
				<br>
			</center>
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label class="control-label col-sm-3">Name :</label>
					<div class="col-sm-9">
						<input type="text" name="name" class="form-control" placeholder="Enter company name (min 3 characters)" required="required" pattern="^([a-zA-Z\s]{3,})$" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Company Id :</label>
					<div class="col-sm-9">
						<input type="text" name="companyid" class="form-control" placeholder="Enter Company Id" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Description:</label>
					<div class="col-sm-9">
						<textarea name="description" class="form-control" placeholder="Say something about your company" required="required"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Type :</label>
					<div class="col-sm-9">
						<select class="form-control" name="type">
							<?php
								$result=mysqli_fetch_all($row,MYSQLI_ASSOC);
								foreach($result as $k)
								{
									echo "<option value='".$k["id"]."'>".$k["type"]."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">HeadQuarters : </label>
					<div class="col-sm-9">
						<input type="text" name="head" class="form-control" placeholder="Enter Location of headquarters : " id="name" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Licence no :</label>
					<div class="col-sm-9">
						<input type="text" name="license" class="form-control" placeholder="Enter Licence/business permit no" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Corporate-Email :</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter Corporate-Email" required="required">
					</div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-3" for="pwd">Upload Logo : :</label>
				    <div class="col-sm-9"> 
				      <input type="file" class="form-control" placeholder="Enter password" name="logo" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Wikipedia :</label>
					<div class="col-sm-9">
						<input type="text" name="wikipedia" class="form-control" placeholder="Enter Wikipedia Link" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Website : </label>
					<div class="col-sm-9">
						<input type="text" name="website" class="form-control" placeholder="Give your web Identity" required="required">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3">password :</label>
					<div class="col-sm-9">
						<input type="password" name="password" id="pwd" class="form-control" placeholder="Enter Password" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Retype Password :</label>
					<div class="col-sm-9">
						<input type="password" name="password" class="form-control" placeholder="Renter Password" required="required">
					</div>
				</div>

				  <div class="form-group"> 
				      <center>
				      <br>
				      	<input type="submit" class="btn btn-success buttons" value="Sign Up" name="signup">
				      	<br> <br>OR <br><br>
				    	<a href="login.php" class="btn btn-primary">Have an account ?</a>
				      </center>
				  </div>
			</form>
		</div>
		<div class="col-xs-3"></div>
	</div>
</div>
<div class="row bottom-body">
	<div class="col-xs-6 bottom-body-left">
		<center>
			<a href="index.php"><img src="../images/student.png" height="170px" width="170px"></a>
			<p>Find best internships and make a dream career .</p>
			<button type="submit" class="btn btn-primary" name="signup">Browse Internships</button>
		</center>
	</div>
	<div class="col-xs-6 bottom-body-right">
		<center>
			<a href="index.php"><img src="../images/company-login.png" height="130px" width="280px"></a>
			<p>Find jobs according to your prefference.</p>
			<br>
			<button type="submit" class="btn btn-primary" name="signup">Browse Jobs</button>
		</center>
	</div>
</div>
	


<?php include('includes/footer.php'); ?>
