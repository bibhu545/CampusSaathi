<?php include('../includes/Database.php'); ?>
<?php include('includes/header.php'); ?>
<?php
	session_start();
	$db = new Database();
	if(isset($_REQUEST["login"]))
	{
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		$sql = "SELECT * FROM student_master WHERE email='".$email."' and password='".$password."'";
		$row = mysqli_query($db->link,$sql);
		if($arr = mysqli_fetch_array($row,MYSQLI_ASSOC))
		{
			if($arr["email"]==$email && $arr["password"]==$password)
			{
				$_SESSION["student"]=$email;
				header('location:index.php');
			}
			else
			{
				header('lacotion:login.php?invalid=Please Try Again');
			}
		}
		else
		{
			header('lacotion:login.php?invalid=Ivalid Username/Password');
		}
	}
?>
<div class="container-fluid">
	<div class="row body">
		<div class="col-xs-4"></div>

		<div class="col-xs-4 middle" style="">

			<center>
			<?php if(isset($_GET["invalid"])) : ?>
  				
			  	<center><div class="alert alert-danger"><?php  echo htmlentities($_GET["invalid"]); ?></div></center>

			<?php endif; ?>
				<h2>Login and Get Connected</h2>
				<br>
				<h4>Join over 2 million students and improve your skills</h4>
				<br>
			</center>
				<form class="form-horizontal" action="login.php">
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="email">Email:</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="pwd">Password:</label>
				    <div class="col-sm-10"> 
				      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3">
				    <div class="col-sm-offset-9 col-sm-offset-3">
				      
				        <a href="signup.php">Forgot your password ?</a>
				      
				    </div>
				  </div>
				  <div class="form-group"> 
				    
				      <center>
				      <br>
				      	<input type="submit" class="btn btn-success" value="Login" name="login">
				      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    	<a href="signup.php" class="btn btn-primary">Create an account</a>
				    	<!-- <hr style="margin: 30px;"> -->
				    	<br><br>or Login with<br>
				    	<a href="#" class="btn btn-primary">Login with facebook</a>
				    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    	<a href="#" class="btn btn-danger">Login with Gmail</a>
				      </center>
				    
				  </div>
				</form>
		</div>
		<div class="col-xs-4"></div>
	</div>
</div>
<div class="row bottom-body" style="">
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