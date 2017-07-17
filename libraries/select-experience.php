
<?php include('../includes/Database.php'); ?>
<?php

	$db = new Database();
	$id = $_REQUEST['did'];
	$query = "SELECT * FROM jobs as t1 left join location as t2 on t1.place=t2.place_id WHERE experience ='".$id."'";
	$row = $db->select($query);
?>
<?php  while($jobs = $row->fetch_assoc()): ?>
		<div class="post-job">
			<div class="col-xs-9">
				<h3><?php echo $jobs["title"]; ?></h3>
				<table class="table">
					<tr><td colspan="2">By : <?php echo $jobs["companyid"]; ?></td></tr>
					<tr><th>Place : </th><th> salary</th><th>posted on : </th><th>last date : </th></tr>
					<tr><th><?php echo $jobs["location"]; ?></th><th><?php echo $jobs["salary"]; ?></th><th><?php echo $jobs["lastdate"]; ?></th><th><?php echo $jobs["lastdate"]; ?></th></tr>
				</table>
			</div>
			<div class="col-xs-3">
				<img src="company/logo/<?php echo $jobs["companyid"]; ?>.jpg" height="100px" width="150px">
				<br><br>
				<a href="jobdetails.php?id=<?php echo $jobs["id"]; ?>" class="btn btn-primary knowmore" >know more</a>
			</div>
		</div>
	<?php endwhile; ?>