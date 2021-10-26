<?php  

	require 'connector/connect.php';

	// pk dili ni pwede ma apil ma condition
	$pk =  mysqli_real_escape_string($conn,$_POST['pk']);


	// kani ra e condition
	$id_num = mysqli_real_escape_string($conn,$_POST['id']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$mname = mysqli_real_escape_string($conn,$_POST['mname']);
	// $age = mysqli_real_escape_string($conn,$_POST['age']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$birthdate = mysqli_real_escape_string($conn,$_POST['birthdate']);
	$place_birth = mysqli_real_escape_string($conn,$_POST['place_birth']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$citizen = mysqli_real_escape_string($conn,$_POST['citizenship']);
	$cstatus = mysqli_real_escape_string($conn,$_POST['cstatus']);
	$spouse = mysqli_real_escape_string($conn,$_POST['spouse']);
	$religion = mysqli_real_escape_string($conn,$_POST['religion']);
	$home_address = mysqli_real_escape_string($conn,$_POST['home_address']);
	$father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
	$mother_name = mysqli_real_escape_string($conn,$_POST['mother_name']);
	$parent_address = mysqli_real_escape_string($conn,$_POST['parent_address']);
	$eschool = mysqli_real_escape_string($conn,$_POST['eschool']);
	$eyear = mysqli_real_escape_string($conn,$_POST['eyear']);
	$hschool = mysqli_real_escape_string($conn,$_POST['hschool']);
	$hyear = mysqli_real_escape_string($conn,$_POST['hyear']);
	$tgrad = mysqli_real_escape_string($conn,$_POST['tgrad']);
	$tyear = mysqli_real_escape_string($conn,$_POST['tyear']);
	$pgrad = mysqli_real_escape_string($conn,$_POST['pgrad']);
	$pyear = mysqli_real_escape_string($conn,$_POST['pyear']);


	if (isset($_POST['Submit'])) {
		if (empty($id_num) || empty($email) || empty($fname)) {
			header("location: user?empty=fields");
			exit();
		}
		else if (!preg_match("/^[a-zA-Z '\']*$/",$fname)) {
			header("location: user?fname=not_valid");
			exit();
		}
		else if (!preg_match("/^[0-9 -]*$/",$id_num)) {
			header("location: user?id=not_valid_character");
			exit();
		}
		else if (!preg_match("/^[a-zA-Z '\']*$/",$lname)) {
			header("location: user?lname=not_valid");
			exit();
		}
		else{
			$update_status = "UPDATE status_form SET status = 2 WHERE Profile_fk = $pk";
			if (mysqli_query($conn,$update_status) === TRUE) {
				header("location: user?submit=success");
				exit();
			}
			else{
				header("location: user?submit=failed");
			}
		}
	}


?>