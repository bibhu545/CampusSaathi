<?php include('../includes/Database.php') ?>
<?php include('includes/header.php') ?>
<?php

	$db = new Database();
	if(isset($_POST["submit"]))
	{
		$name = mysqli_real_escape_string($db->link,$_POST["name"]);

		$query = "INSERT INTO duration(duration) VALUES ('".$name."')";
		$update = $db->update($query);

	}

?>
	<form method="POST" action="add-duration.php">
		<div class="form-gruop">
			<label>New Duration Timing : </label>
			<input type="text" name="name" class="form-control" placeholder="Enter New Duration ">
		</div>
		<br> 
		<div>
			<input type="submit" name="submit" class="btn btn-primary">
				
			&nbsp;&nbsp;&nbsp;&nbsp;

			<a href="index.php" class="btn btn-default">Cancel</a>
		</div>
		<br><br>
	</form>

<?php include('includes/footer.php') ?>