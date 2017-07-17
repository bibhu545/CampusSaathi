<?php include('../includes/Database.php') ?>
<?php include('includes/header.php'); ?>
<?php

	$db = new Database();
	$sql = "SELECT * FROM college_master";
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
		<tr><th>Id#</th><th>College Name</th><th>College Id</th><th>Action</th></tr>

		<?php while($college = $row->fetch_assoc()): ?>
		<tr>
			<th><?php echo $college['id']; ?></th>
			<th><?php echo $college['name']; ?></th>
			<th><?php echo $college['collegeid']; ?></th>
			<th><a href="remove-college.php?id=<?php echo $college['id']; ?>" class="btn btn-danger" onclick="return show()">Remove</a></th>
		</tr>
		<?php endwhile; ?>
	</table>

<?php  include('includes/footer.php'); ?>
