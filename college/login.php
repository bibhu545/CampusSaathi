<?php include('../includes/Database.php'); ?>
<?php include('includes/header.php'); ?>

<?php
	session_start();
	$db = new Database();
	if(isset($_REQUEST["Login"]))
	{
		$collegeid = $_REQUEST["collegeid"];
		$password = $_REQUEST["password"];
		//echo "$collegeid";
		$sql = "SELECT * FROM college_master WHERE collegeid='".$collegeid."' and password='".$password."'";
		$row = mysqli_query($db->link,$sql);
		if($arr = mysqli_fetch_array($row,MYSQLI_ASSOC))
		{
			if($arr["collegeid"]==$collegeid && $arr["password"]==$password)
			{
				$_SESSION["college"]=$collegeid;
				header('location:index.php');
			}
			else
			{
				echo "Try again.";
			}
		}
		else
		{
			header('lacotion:login.php?invalid=Ivalid Username/Password');
		}
	}
?>

<div class="container-fluid">
	<div class="row body-college">
		<div class="col-xs-4"></div>

		<div class="col-xs-4 middle" style="">

			<center>
			<?php if(isset($_GET["login"])) : ?>
  				
			  	<center><div class="alert alert-success"><?php  echo htmlentities($_GET["login"]); ?></div></center>

			<?php endif; ?>
			<?php if(isset($_GET["invalid"])) : ?>
  				
			  	<center><div class="alert alert-danger"><?php  echo htmlentities($_GET["invalid"]); ?></div></center>

			<?php endif; ?>
				<h2>Login and Get Connected</h2>
				<br>
				<h4>Join over 300+ colleges</h4>
				<br>
			</center>
				<form class="form-horizontal">

				  <div class="form-group">
				    <label class="control-label col-sm-3">College id :</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter College Id" name="collegeid" required="required">
				   </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="pwd">Password:</label>
				    <div class="col-sm-9"> 
				      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required="required">
				  </div>
				  </div>

				  <div class="form-group"> 
				    <div class="col-sm-offset-3">
				    <div class="forget">
				      
				        <a href="signup.php" style="text-decoration: none;color: white;">Forgot your password ?</a>
				      
				    </div>
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
		<div class="col-xs-4 bottom-body-left">
			<center>
				<a href="index.php"><img src="../images/student.png" height="170px" width="170px"></a>
				<p>Find best internships and get opportunities for your students</p>
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