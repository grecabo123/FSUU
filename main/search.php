<?php 
	
	include 'connector/connect.php';
	if (isset($_POST['check'])) {
		$id = mysqli_real_escape_string($conn,$_POST['id']);
		$sql = "SELECT * FROM collegiate where ID = $id";

		$resul_val =[];

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			foreach ($result as $data) {
			    array_push($resul_val, $data);
			}
			header("Content-type: application/json");
			echo json_encode($resul_val);
		}
	}
?>