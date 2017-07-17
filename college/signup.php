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
		$collegeid = $_REQUEST["collegeid"];
		$description = $_REQUEST["description"];
		$type = $_REQUEST["type"];
		$address = $_REQUEST["address"];
		$phone = $_REQUEST["phone"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		$website = $_REQUEST["website"];
		$sql = "INSERT INTO college_master (name,collegeid,description,type,address,phone,website,email,password) VALUES ('$name','$collegeid','$description',$type,'$address','$phone','$website','$email','$password') ";
		$row = mysqli_query($db->link,$sql);
	}

?>
<?php

	$query = "SELECT * FROM college_type";

	$row = $db->select($query);	

?>



<div class="container-fluid">
	<div class="row body-college">
		<div class="col-xs-3"></div>

		<div class="col-xs-6 middle">

			<center>
				<h2>Sign up and Get connected</h2>
				<br>
				<h4>Discover Career openings for your students</h4>
				<br>
			</center>
			<form class="form-horizontal" action="signup.php" method="POST">

				<div class="form-group">
					<label class="control-label col-sm-3">Name :</label>
					<div class="col-sm-9">
						<input type="text" name="name" class="form-control" placeholder="Enter name here" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">College id :</label>
					<div class="col-sm-9">
						<input type="text" name="collegeid" class="form-control" placeholder="Enter College id" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Description:</label>
					<div class="col-sm-9">
						<textarea name="description" class="form-control" placeholder="A good description attracts more companies"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">College Type :</label>
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
					<label class="control-label col-sm-3">Address:</label>
					<div class="col-sm-9">
						<textarea name="address" class="form-control" placeholder="Enter college address"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Phone no:</label>
					<div class="col-sm-9">
						<input type="text" name="phone" class="form-control" placeholder="Enter Enquiry number" required="required">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-3">Website : </label>
					<div class="col-sm-9">
						<input type="text" name="website" class="form-control" placeholder="Give your web Identity">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">College-Email :</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter College-Email here" required="required">
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
						<input type="password" class="form-control" placeholder="Renter Password" required="required">
					</div>
				</div>

				  <div class="form-group"> 
				    <center>
				      <br>
				      	<input type="submit" class="btn btn-success" value="Sign Me Up" name="signup">
				      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    	<a href="login.php" class="btn btn-primary">Have an account ?</a>
				      </center>
				  </div>
			</form>
		</div>
		<div class="col-xs-3"></div>
	</div>
</div>
<div class="row bottom-body">
	<div class="col-xs-4 bottom-body-left">
		<center>
			<a href="index.php"><img src="../images/student.png" height="170px" width="170px"></a>
			<p">Find best internships and get opportunities for your students</p>
			<button type="submit" class="btn btn-primary" name="signup">Browse Internships</button>
		</center>
	</div>
	<div class="col-xs-4 bottom-body-middle">
		<center>
			<a href="index.php"><img src="../images/company-login.png" height="130px" width="280px"></a>
			<p>Find jobs to make your students prepared</p>
			<br>
			<button type="submit" class="btn btn-primary" name="signup">Browse Jobs</button>
		</center>
	</div>
	<div class="col-xs-4 .bottom-body-right">
		<center>
			<a href="index.php"><img src="../images/college.png" height="130px" width="280px"></a>
			<p>Find Companies to invite for Recruitment</p>
			<br>
			<button type="submit" class="btn btn-primary" name="signup">Browse companies</button>
		</center>
	</div>
</div>
	


<?php include('includes/footer.php'); ?>