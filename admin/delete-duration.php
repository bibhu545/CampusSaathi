<?php include('../includes/Database.php'); ?>
<?php
	
	$db = new Database();
	$id = $_GET["id"];
	$query = "DELETE FROM duration WHERE id = ".$id;
	$delete_type = $db->delete($query);

?>