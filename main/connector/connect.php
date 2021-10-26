<?php 

	$server = "localhost";
	$dbhost = "root";
	$dbpass = "";
	$dbuse = "fsuu";


	$conn = mysqli_connect($server,$dbhost,$dbpass,$dbuse);

	if (!$conn) {
		die('Failed To Connect'.mysqli_error());
	}


 ?>