
<?php  

	require 'connector/connect.php';
	$key = mysqli_real_escape_string($conn,$_POST['key']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$student_id = mysqli_real_escape_string($conn,$_POST['stud_id']);
	$course = mysqli_real_escape_string($conn,$_POST['course']);
	$mname = mysqli_real_escape_string($conn,$_POST['mname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$sex = mysqli_real_escape_string($conn,$_POST['sex']);
	$birthdate = mysqli_real_escape_string($conn,$_POST['birthdate']);
	$birth_place = mysqli_real_escape_string($conn,$_POST['birth_place']);
	$age = mysqli_real_escape_string($conn,$_POST['age']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
	$mother_name = mysqli_real_escape_string($conn,$_POST['mother_name']);
	$parent_adr = mysqli_real_escape_string($conn,$_POST['parent_adr']);

	// $adr = mysqli_real_escape_string($conn,$_POST['adr']);
	// $status = mysqli_real_escape_string($conn,$_POST['status']);
	// $home_adr = mysqli_real_escape_string($conn,$_POST['home_adr']);
	// $spouse = mysqli_real_escape_string($conn,$_POST['spouse']);
	// $citizen = mysqli_real_escape_string($conn,$_POST['citizen']);



	if (isset($_POST['update'])) {
		if(!preg_match("/^[a-zA-Z]*$/",$fname)) {
			header("location: profile?fname=invalid");
		}
		else{
			$sql = "UPDATE profile as p JOIN student as stu ON p.ProfileID = stu.ProfileID_fk SET p.first_name ='$fname',p.middle_name='$mname',p.last_name='$lname',p.age=$age,p.gender='$sex',p.Birthdate='$birthdate',p.Birthplace='$birth_place',p.contact=$contact,stu.course='$course',stu.Student_id=$student_id,stu.Year=$year,stu.father_name='$father_name',stu.mother_name='$mother_name',stu.parent_address='$parent_adr' WHERE p.ProfileID = $key";
			if (mysqli_query($conn,$sql) === TRUE) {
				header("location: profile?data=updated");
				exit();
			}
			else{
				header("location: profile?update=failed");
				exit();
			}
		}
	}

?>