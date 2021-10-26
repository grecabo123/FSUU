<?php  


	require '../connector/connect.php';
	require '../smtp/PHPMailerAutoload.php';
	include '../smtp/class.phpmailer.php';




	// sql injecttion

	// profile table
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$mname = mysqli_real_escape_string($conn,$_POST['mname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$age = mysqli_real_escape_string($conn,$_POST['age']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$birthdate = mysqli_real_escape_string($conn,$_POST['birthdate']);
	$place_birth = mysqli_real_escape_string($conn,$_POST['place_birth']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);


	if (expr) {
		
	}


?>