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
		$college = $_REQUEST["college"];
		$batch = $_REQUEST["batch"];
		$skills = $_REQUEST["skills"];
		$github = $_REQUEST["github"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		$college_type = $_REQUEST["college_type"];
		$sql = "INSERT INTO student_master (name,college,course,batch,email,github,skills,password) VALUES ('$name','$college',$college_type,'$batch','$email','$github','$skills','$password') ";
		$row = mysqli_query($db->link,$sql);

		if ($row) 
		{
			header('location:login.php');
		}
		else
		{
			header("location:signup.php?msg=Error...Please try again.");
		}
	}

?>
<?php

	$query = "SELECT * FROM college_type";

	$row = $db->select($query);	

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
			<form class="form-horizontal" method="POST" action="signup.php">

				<div class="form-group">
					<label class="control-label col-sm-3">*Name :</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Enter name here" name="name" id="name" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">*College :</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Enter College name" name="college" required="required" id="collegename">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">*Course :</label>
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
					<label class="control-label col-sm-3">*Batch :</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Year of passout" name="batch" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">*Skills :</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Year of passout" name="skills" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Github :</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Year of passout" name="github">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">*Email :</label>
					<div class="col-sm-9">
						<input type="email" id="email" class="form-control" placeholder="Enter Email here" name="email" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">*password :</label>
					<div class="col-sm-9">
						<input type="password" id="pwd" class="form-control" placeholder="Enter Password" name="password" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Retype Password :</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" placeholder="Renter Password" required="required">
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