<?php  

	require 'connector/connect.php';
	if (isset($_POST['delete'])) {
		$delete_key = mysqli_real_escape_string($conn,$_POST['delete_key']);

		$delete = "DELETE FROM collegiate WHERE ID = $delete_key";
		$result = mysqli_query();
	}

?>