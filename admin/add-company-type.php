<?php include('../includes/Database.php') ?>
<?php include('includes/header.php') ?>
<?php

	$db = new Database();
	if(isset($_POST["submit"]))
	{
		$name = mysqli_real_escape_string($db->link,$_POST["name"]);

		$query = "INSERT INTO company_type(type) VALUES ('".$name."')";
		$update = $db->update($query);

	}

?>
	<form method="POST" action="add-company-type.php">
		<div class="form-gruop">
			<label>New Company Type : </label>
			<input type="text" name="name" class="form-control" placeholder="Enter Company Type">
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