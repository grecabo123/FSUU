<?php  

	require 'connector/connect.php';

	
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

	$error = array(
		'email' => 'Email must be urios email',
		'password' => 'Wrong Password'

	);

	$error['email'];

	if (isset($_POST['Register'])) {
		if (empty($mname)  || empty($gender) || empty($birthdate) || empty($place_birth) || empty($contact)) {
			header("location: form?empty=failed");
			exit();
		}
		else{
			$hash = "";
			$course = "BSIT";
			$type = "admin";
			// $age = 21;
			 $sql = "INSERT INTO profile (first_name,middle_name,last_name,age,gender,Birthdate,Birthplace,Email,contact,password) VALUES ('$fname','$mname','$lname',21,'$gender','$birthdate','$place_birth','$email','$contact',null)";
			 if (mysqli_query($conn,$sql) === TRUE) {
			 		$last_key = mysqli_insert_id($conn);
			 		$student = "INSERT INTO student (course,Year,father_name,mother_name,parent_address,ProfileID_fk) VALUES ('$course',2013,'$father_name','$mother_name','$parent_address',$last_key)";
			 		if (mysqli_query($conn,$student) === TRUE) {
			 			$account_type = "INSERT INTO account_type(account_type,account_type_approver,account_type_requester,ProfileID_fk) VALUES ('$type',null,null,$last_key)";
			 			if (mysqli_query($conn,$account_type) === TRUE) {
			 				$adr = "INSERT INTO address (city,ProfileID_fk) VALUES ('$home_address',$last_key)";
			 				if (mysqli_query($conn,$adr) === TRUE) {
			 					$educa = "INSERT INTO education (elementary_school_name,elementary_year_graduated,high_school_name,high_school_graduate,tertiary_school_name,tertiary_school_graduate,post_school_name,post_school_graduate,Profile_fk) VALUES ('$eschool','$eyear','$hschool','$hyear','$tgrad','$tyear','$pgrad','$pyear',$last_key)";
			 					if (mysqli_query($conn,$educa) === TRUE) {
			 						$_SESSION['user_email'] = $email;
									header("location: user");
									exit();
			 					}
			 					else {
			 						header("location: form");
			 						exit();
			 					}
			 				}
			 				else {
			 					header("location: form");
			 					exit();
			 				}
			 			}
			 			else {
			 				eheader("location: form");
			 				exit();
			 			}
			 		}
			 		else{
			 			header("location: form");
			 			exit();
			 		}
			 }
			 else {
			 	header("location: form");
			 	exit();
			 }
		}
	}
	else {
		header("location: form?error");
	}


?>



