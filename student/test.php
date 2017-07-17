
<?php include('includes/header.php'); ?>
<?php
	
	if(isset($_REQUEST["login"]))
	{
		header("location:login.php");
	}

?>
<?php

	$con=mysqli_connect("localhost","root","","hrsolutions");

	if(isset($_REQUEST["signup"]))
	{
		$name = mysqli_real_escape_string($_REQUEST["name"]);
		$college = $_REQUEST["college"];
		$batch = $_REQUEST["batch"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		$college_type = $_REQUEST["college_type"];
		$sql = "INSERT INTO student_master(name,college,course,batch,email,password) VALUES('".$name."','".$college."','".$college_type."','".$batch."','".$email."','".$password."')";
		$row = mysqli_query($con,$sql);
	}

?>
<?php

	$query = "SELECT * FROM college_type";
	$row = mysqli_query($con,$query);

?>
<div class="container-fluid">
	<div class="row body">
		<div class="col-xs-3"></div>

		<div class="col-xs-6 middle">

			<center>
				<h2>Sign up and Dicover your <strong>FUTURE</strong></h2>
				<br>
				<h4>Join over 2 million students and improve your skills</h4>
				<br>
			</center>
			<form class="form-horizontal">

				<div class="form-group">
					<label class="control-label col-sm-3">Name :</label>
					<div class="col-sm-9">
						<input type="text" name="" class="form-control" placeholder="Enter name here" name="name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">College :</label>
					<div class="col-sm-9">
						<input type="text" name="" class="form-control" placeholder="Enter College name" name="college">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Course :</label>
					<div class="col-sm-9">
						<select class="form-control" name="college_type">
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
					<label class="control-label col-sm-3">Batch :</label>
					<div class="col-sm-9">
						<input type="text" name="" class="form-control" placeholder="Year of passout" name="batch">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Email :</label>
					<div class="col-sm-9">
						<input type="email" name="" id="email" class="form-control" placeholder="Enter Email here" name="email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">password :</label>
					<div class="col-sm-9">
						<input type="password" name="" id="pwd" class="form-control" placeholder="Enter Password" name="password">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Retype Password :</label>
					<div class="col-sm-9">
						<input type="password" name="" class="form-control" placeholder="Renter Password">
					</div>
				</div>

				  <div class="form-group"> 
				    <center>
				      <br>

				      	<input type="submit" class="btn btn-success" value="Sign me up" name="signup">

				      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				    	<input type="submit" class="btn btn-primary" value="Have an account ?" name="login">
				    	
				    	<br><br>OR<br><br>
				    	<button type="submit" class="btn btn-primary" name="signup">Sign up with facebook</i></button>
				    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    	<button type="submit" class="btn btn-danger" name="signup">Sign up with Gmail</i></button>
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
			<p">Find best internships and make a dream career .</p>
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