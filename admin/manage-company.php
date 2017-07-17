<?php include('../includes/Database.php') ?>
<?php include('includes/header.php'); ?>
<?php

	$db = new Database();
	$sql = "SELECT * FROM company_master";
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
		<tr><th>Id#</th><th>Company Name</th><th>Company Id</th><th>Action</th></tr>

		<?php while($company = $row->fetch_assoc()): ?>
		<tr>
			<th><?php echo $company['id']; ?></th>
			<th><?php echo $company['companyid']; ?></th>
			<th><?php echo $company['name']; ?></th>
			<th><a href="remove-company.php?id=<?php echo $company['id']; ?>" class="btn btn-danger"  onclick="return show()">Remove</a></th>
		</tr>
		<?php endwhile; ?>
	</table>

<?php  include('includes/footer.php'); ?>


