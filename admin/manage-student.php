<?php include('../includes/Database.php') ?>
<?php include('includes/header.php'); ?>
<?php

	$db = new Database();
	$sql = "SELECT * FROM student_master";
	$row = $db->select($sql);

?>
<script type="text/javascript">
	function show()
	{
		var x = confirm("Are you sure?");
		if(x)
		{
			return true;
			//window.location('')
		}
		else
			return false;
	}
</script>
	<table class="table table-striped">
		<tr><th>Id#</th><th>Student Name</th><th>Email id</th><th>Action</th></tr>

		<?php while($student = $row->fetch_assoc()): ?>
		<tr>
			<th><?php echo $student['id']; ?></th>
			<th><?php echo $student['name']; ?></th>
			<th><?php echo $student['email']; ?></th>
			<th><a href="remove-student.php?id=<?php echo $student['id']; ?>" class="btn btn-danger" onclick="return show()">Remove</a></th>
		</tr>
		<?php endwhile; ?>
	</table>

<?php  include('includes/footer.php'); ?>
