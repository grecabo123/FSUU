<?php  

	session_start();

	require '../connector/connect.php';
	if (isset($_GET['vkey'])) {
		
		$email = $_SESSION['tmp_email'];
		$key = $_GET['vkey'];

		$sql = "SELECT *from profile WHERE Email = '$email'";
		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
		    if ($row['Email'] == $email) {
		    	$id = $row['ProfileID'];

		    	Confirm_Account($id);
		    }
		}


	}


?>


<?php  


function Confirm_Account($id){

	require '../connector/connect.php';

	$update = "UPDATE "
}

?>