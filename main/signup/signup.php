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

	// student table
	// $course = mysqli_real_escape_string($conn,$_POST['course']);
	// $year = mysqli_real_escape_string($conn,$_POST['year']);
	// $guardian_name = mysqli_real_escape_string($conn,$_POST['guardian_name']);

	// account type
	// $account_type = mysqli_real_escape_string($conn,$_POST['account_type']);
	
	// address
	// $brgy = mysqli_real_escape_string($conn,$_POST['brgy']);
	// $city = mysqli_real_escape_string($conn,$_POST['city']);

	// clearance status
	// $status = mysqli_real_escape_string($conn,$_POST['status']);


	if (isset($_POST['Register'])) {
		// if (empty($fname) || empty($mname) || empty($lname) || empty($age) || empty($gender) || empty($birthdate) || empty($place_birth) || empty($contact) || empty($course) || empty($year) || empty($guardian_name) || empty($account_type) || empty($brgy) || empty($city) || empty($status)) {
		// 	header("location: ../register?empty=fields");
		// }
		// if (empty($fname) ||) {
				
		// }	
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("location: ../register?email=not_valid");
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
			header("location: ../register?invalid=numbers");
			exit();
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$mname)) {
			header("location: ../register?invalid=numbers");
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
			header("location: ../register?invalid=numbers");
		}
		else if (!preg_match("/^[a-zA-Z]*$/",$gender)) {
			header("location: ../register?invalid=numbers");
		}
		else if (!preg_match("/^[0-9 -]*$/",$birthdate)) {
			header("location: ../register?invalid=numbers");
		}
		else if (!preg_match("/^[0-9]*$/",$contact)) {
			header("location: ../register?invalid=numbers");
		}
		else if (!preg_match("/^[0-9]*$/",$age)) {
			header("location: ../register?invalid=numbers");
		}
		else{
			$sql = "SELECT Email from profile WHERE Email = '$email'";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				header("location: ../register?email=already_exist");
			}
			else{
				create_account($fname,$mname,$lname,$age,$email,$contact,$gender,$birthdate,$place_birth,$pass);
			}
		}
	}
?>


<?php  
	

	function create_account($fname,$mname,$lname,$age,$email,$contact,$gender,$birthdate,$place_birth,$pass){

			require '../connector/connect.php';

			$hash = password_hash($pass, PASSWORD_BCRYPT);
			$sql = "INSERT INTO profile(first_name,middle_name,last_name,age,gender,Birthdate,Birthplace,Email,password) VALUES ('$fname','$mname','$lname',$age,'$gender','$birthdate','$place_birth','$email','$hash')";
			
			if (mysqli_query($conn,$sql) === TRUE) {

				session_start();
				$id = mysqli_insert_id($conn);
				$_SESSION['tmp_email'] = $email;

				$first_name = md5(time().$fname);
				$last_name = md5(time().$lname);
				
				$site_key = $first_name."".$last_name;
				$tbl_key = "INSERT INTO vkey(site_key,ProfileFK) VALUES ('$site_key',$id)";
				if (mysqli_query($conn,$tbl_key) === TRUE) {

					$email_temple = "../Email/email.php";
					$full_name = "$fname"."$lname";

					$vkey = "http://localhost/Thesis_Fsuu/main/Email/verify?vkey=$site_key";

					$mail = new PHPMailer;


				// setup
				$mail->isSMTP();
				$mail->Host ="smtp.gmail.com";
				$mail->Port=465;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure="ssl";

				// SSL = Secure Socket layer = 465
				// TLS = Transport Layer Security = 587

				// information
				$mail->Username='fsuuclearance@gmail.com';
				$mail->Password='obyzlcdidxnlnkzb';
				// form
				$mail->setFrom('fsuuclearance@gmail.com','Fsuu Clearance');
				// send to 
				$mail->addAddress($email);
				// From
				$mail->addReplyTo('fsuuclearance@gmail.com');

					// content from other file
				// $email_item = array(
				// "{{EMAIL_LOGO}}" => "http://web_msg/main/image/envelope-regular.png",
				// "{{USER_NAME}}" => "$fname"." "."$lname",
				// "{{EMAIL_ADD}}" => "$email",
				// "{{SITE_KEY}}" => "http://localhost/web_msg/main/Verification/email?vkey=$vkey"
				// );
				// $img = AddEmbeddedImage($image,'logo');
				$message = file_get_contents($email_temple);
				$message = str_replace('{{Name}}', $full_name, $message); 
    			$message = str_replace('{{EMAIL_ADD}}', $email, $message);
    			$message = str_replace('{{SITE_KEY}}', $vkey,$message);
    			// $message->AddEmbeddedImage($image, 'Web Message');
    			// $message = str_replace('{{EMAIL_LOGO}}',$img, $message);
    			// $message = AddEmbeddedImage($image);
    			// $message = str_replace('{{key}}' ,)
				// html tag for email validation
				$mail->isHTML(true);
				$mail->CharSet="utf-8";
				$mail->Subject='Email Validation';
				$mail->MsgHTML($message);

			if (file_exists($email_temple)) {
				if ($mail->send()) {
					header("location: ../success");
						// foreach ($email_item as $key =>$value) {
						// $message = str_replace($key, $value, $message);
					// header("location: validation");
						// }
				}
				else{
					echo 'failed to sent';
				}
			}
				}
				

				// echo 'Register';
				// $id = mysqli_insert_id($conn);
				// $stud_tbl = "INSERT INTO student (course,Year,guardian_name,ProfileID_fk) VALUES('$course',$year,'$guardian_name',$id)";
				// if (mysqli_query($conn,$stud_tbl) === TRUE) {
				// 	$approve = "";
				// 	$type_requester = "";
				// 	$account_type_tbl = "INSERT INTO account_type(account_type,account_type_approver,account_type_requester,ProfileID_fk) VALUES('$account_type','$approve','$type_requester',$id)";
				// 	if (mysqli_query($conn,$account_type_tbl) === TRUE) {
						
				// 	}

				// }





			}

	}


?>
