<?php include('../includes/Database.php'); ?>
<?php
	
	 $db = new Database();
	 $id = $_REQUEST['did'];
	 $status = "rejected";
	 $date = date("Y-m-d h:i:sa");

	 $query = "UPDATE request_to_college SET
	 				status = '$status',
	 				replydate = '$date' WHERE id = '".$id."'";

	 $row = mysqli_query($db->link,$query);

	echo "Rejected Successfully!!";
?>