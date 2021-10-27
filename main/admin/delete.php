<?php  

	require '../connector/connect.php';
	$student_id = mysqli_real_escape_string($conn,$_POST['student_id']);

	if (isset($_POST['delete'])) {
		$sql = "DELETE FROM collegiate WHERE student_id = $student_id";
		if (mysqli_query($conn,$sql) === TRUE) {
			header("location: admin?data=deleted");
			exit();
		}
		else{
			header("location: admin?data=failed");
			exit();
		}
	}
	else {
		header("location: admin?failed");
		exit();
	}


?>