<?php  

	require 'connector/connect.php';

	// pk dili ni pwede ma apil ma condition
	$pk =  mysqli_real_escape_string($conn,$_POST['pk']);


	// kani ra e condition
	$id_num = mysqli_real_escape_string($conn,$_POST['student_number']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$mname = mysqli_real_escape_string($conn,$_POST['mname']);
	$course = mysqli_real_escape_string($conn,$_POST['course']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$birthdate = mysqli_real_escape_string($conn,$_POST['birthdate']);
	$place_birth = mysqli_real_escape_string($conn,$_POST['place_birth']);
	// $contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$citizen = mysqli_real_escape_string($conn,$_POST['citizenship']);
	$cstatus = mysqli_real_escape_string($conn,$_POST['cstatus']);
	$spouse = mysqli_real_escape_string($conn,$_POST['spouse']);
	// $religion = mysqli_real_escape_string($conn,$_POST['religion']);
	$home_address = mysqli_real_escape_string($conn,$_POST['home_address']);
	$father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
	$mother_name = mysqli_real_escape_string($conn,$_POST['mother_name']);
	$parent_address = mysqli_real_escape_string($conn,$_POST['parent_address']);
	$eschool = mysqli_real_escape_string($conn,$_POST['eschool']);
	$eyear = mysqli_real_escape_string($conn,$_POST['eyear']);
	$hschool = mysqli_real_escape_string($conn,$_POST['hschool']);
	$hyear = mysqli_real_escape_string($conn,$_POST['hyear']);


	if (isset($_POST['Submit'])) {
		if (!preg_match("/^[a-zA-Z '\']*$/",$fname)) {
			header("location: user?fname=not_valid");
			exit();
		}
		else if (!preg_match("/^[0-9]*$/",$id_num)) {
			header("location: user?id=not_valid_character");
			exit();
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
			header("location: user?lname=not_valid");
			exit();
		}
		else{
				// $status_form = "SELECT email from status_form WHERE email = '$email'";
				// $result = mysqli_query($conn,$status_form);
				// if (mysqli_num_rows($result) > 0) {
				// 	header("location: user?already=submitted");
				// 	exit();
				// }
				// else{
					$status_account =4;
					$update = "INSERT INTO status_form(status,Profile_fk,email) VALUES ($status_account,$pk,'$email')";
					if (mysqli_query($conn,$update) === TRUE) {
						$insert = "INSERT INTO collegiate(student_id,Course,first_name,middle_name,last_name,date_of_birth,place_of_birth,citizenship,gender,civil_status,Spouse,home_address,father_name,mother_name,parent_address,elementary_grad,elementary_year,high_school_grad,high_school_year,Profile_fk,email,date_msg) VALUES ($id_num,'$course','$fname','$mname','$lname','$birthdate','$place_birth','$citizen','$gender','$cstatus','$spouse','$home_address','$father_name','$mother_name','$parent_address','$eschool',$eyear,'$hschool',$hyear,$pk,'$email',NOW())";
						if (mysqli_query($conn,$insert) === TRUE) {
							header("location: temporary?form=submitted");
							exit();
						}
						else{
							header("location: user?form=failed");
							exit();
						}
					}
					else{
						header("location: user?form=failed");
						exit();
					}
				
			
		}
	}
	else{
		header("location: user?something=went_wrong");
		exit();
	}


?>
