<?php include('../includes/Database.php'); ?>
<?php include('includes/header.php'); ?>

<?php
	session_start();
	$db = new Database();
	if(isset($_REQUEST["Login"]))
	{
		$companyid = $_REQUEST["companyid"];
		$password = $_REQUEST["password"];
		$sql = "SELECT * FROM company_master WHERE companyid='".$companyid."' and password='".$password."'";
		$row = mysqli_query($db->link,$sql);
		if($arr = mysqli_fetch_array($row,MYSQLI_ASSOC))
		{
			if($arr["companyid"]==$companyid && $arr["password"]==$password)
			{
				$_SESSION["company"]=$companyid;
				header('location:index.php');
			}
			else
			{
				echo "Try again.";
			}
		}
		else
		{
			echo "invalid";
		}
	}
?>
<div class="container-fluid" style="margin-top: 40px;">
	<div class="row body">
		<div class="col-xs-4"></div>

		<div class="col-xs-4 middle">

			<center>
			<?php if(isset($_GET["login"])) : ?>
  				
			  	<center><div class="alert alert-success"><?php  echo htmlentities($_GET["login"]); ?></div></center>

			<?php endif; ?>
				<h2>Login and Start Hiring</h2>
				<br>
				<h4>Find over 2 million students and 300+ colleges</h4>
				<br>
			</center>
				<form class="form-horizontal" onsubmit="return validate()">

				  <div class="form-group">
				    <label class="control-label col-sm-4">Company id:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" placeholder="Enter Company Id" name="companyid">
				   </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-4" for="pwd">Password :</label>
				    <div class="col-sm-8"> 
				      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
				  </div>
				  </div>

				  <div class="form-group"> 
				    <div class="col-sm-offset-3">
				    <div class="forget">
				      
				        <a href="signup.php" style="text-decoration: none;color: white;">Forgot your password ?</a>
				      
				    </div>
				  </div>
				  <div class="form-group"> 
				    
				      <center>
				      <br>
				      	<input type="submit" class="btn btn-success buttons" value="Login" name="Login">
				      	<br> <br>OR <br><br>
				    	<a href="signup.php" class="btn btn-primary buttons">Create an account</a>
				      </center>
				    
				  </div>
				</form>
		</div>
		<div class="col-xs-4"></div>
	</div>
</div>
<div class="row bottom-body">
	<div class="col-xs-6 bottom-body-left">
		<center>
			<a href="index.php"><img src="../images/student.png" height="170px" width="170px"></a>
			<p>Post an internship and open opportunities for students</p>
			<a href="post-internship.php" class="btn btn-primary">Post an Internship</a>
		</center>
	</div>

	<div class="col-xs-6 bottom-body-right"">
		<center>
			<a href="index.php"><img src="../images/company-login.png" height="130px" width="280px"></a>
			<p>Post jobs to atract new TALENTS</p>
			<br>
			<a href="post-job.php" class="btn btn-primary">Post a Job</a>
		</center>
	</div>
</div>
	


<?php include('includes/footer.php'); ?>