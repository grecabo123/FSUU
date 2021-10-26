
<?php  

	session_start();

	 $fname = $_SESSION['fname'];
     $lname =  $_SESSION['lname'];
     $email = $_SESSION['email'];
     Fill_Up($fname,$lname,$email);

?>

<?php  

	function Fill_Up($fname,$lname,$email)
	{
		?>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/form_box.css">
</head>
<body>

<!-- selection form -->
    <div class="option">
        <div class="select">
            <ul>
                <li><label for="">Select Form</label></li>
                <li><select name="" id="">
                <option value="">Collegiate Course</option>
                <option value="">Graduate Course</option>
            </select></li>
            </ul>
        </div>
    </div> 
    
<div class="sign_box">
		<div class="sign_content">
			<form action="signin" autocomplete="off" method="post">
				<center><h2>Father Saturnino Urios University</h2></center>
			<center><h3></h3></center>
			<center><h3>Application for Graduation From Collegiate Course</h3></center>
				<div class="name">
					<div class="input">
						<div class="input_flex">
							<div class="input_list">
							<label for="">Last Name</label>
							<br>
							<input type="text" placeholder="PSA/NSO Birth Certificate-Family Name" name="lname" value="<?php echo $lname; ?>">
						</div>
						<div class="input_list">
							<label for="">First Name</label>
							<br>
							<input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
						</div>
						<div class="input_list">
							<label for="">Middle Name</label>
							<br>
							<input type="text" placeholder="Middle Name" name="mname">
						</div>
						</div>
						
						<div class="input_flex">
							<div class="input_list">
							<label for="">Date of Birth</label>
							<br>
							<input type="text" placeholder="Date of Birth" name="birthdate">
						</div>
						<div class="input_list">
							<label for="">Place of Birth</label>
							<br>
							<input type="text" placeholder="Place of Birth" name="place_birth">
						</div>
						<div class="input_list">
							<label for="">Citizenship </label>
							<br>
							<input type="text" placeholder="Citizenship" name="citizenship">
						</div>
						</div>

						<div class="input_flex">
							<div class="input_list">
							<label for="">Sex</label>
							<br>
							<select name="gender" id="">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="input_list">
							<label for="">Civil Status</label>
							<br>
							<select name="cstatus" id="">
								<option value="Single">Single</option>
								<option value="Married">Married</option>
								<option value="Separated">Separated</option>
								<option value="Widowed">Widowed</option>
							</select>
						</div>
						<div class="email">
							<label for="">Name of Spouse if Married</label>
							<br>
							<input type="text" placeholder="Name of Spouse if Married" name="spouse">
						</div>
						</div>

						<div class="input_flex">
							<div class="input_list">
							<label for="">Religion</label>
							<br>
							<select name="religion" id="">
								<option value="Roman Catholic">Roman Catholic</option>
								<option value="INC">INC</option>
							</select>
						</div>
						<div class="input_list">
							<label for="">Contact Number</label>
							<br>
							<input type="text" placeholder="Contact Number" name="contact">
						</div>
						<div class="email">
							<label for="">Email Address </label>
							<br>
							<input type="text" placeholder="Email Address" name="email" value="<?php echo $email; ?>">
						</div>
						</div>

							<div class="input_list">
							<label for="">Home Address</label>
							<br>
							<input id="home" type="text" placeholder="Home Address" name="home_address">
						</div>
						<hr>
						<center><span id="title">Parents Details</span></center>
						<div class="input_flex">
							<div class="input_list">
							<label for="">Father's Name</label>
							<br>
							<input type="text" placeholder="Father's Name" name="father_name">
						</div>
						<div class="input_list">
							<label for="">Mother's Name</label>
							<br>
							<input type="text" placeholder="Mother's Name" name="mother_name">
						</div>
						<div class="email">
							<label for="">Parent Address</label>
							<br>
							<input type="text" placeholder="Address" name="parent_address">
						</div>
						</div>

						<center><span id="title">Education Background</span></center>
						<div class="input_flex">
							<div class="input_list">
							<label for="">Elementary School Graduated</label>
							<br>
							<input type="text" placeholder="Elementary School Graduated" name="eschool">
						</div>
						<div class="email">
							<label for="">Year Graduated</label>
							<br>
							<input type="text" placeholder="Year Graduated" name="eyear">
						</div>
						</div>

						<div class="input_flex">
							<div class="input_list">
							<label for="">High School Graduated</label>
							<br>
							<input type="text" placeholder="High School Graduated" name="hschool">
						</div>
						<div class="email">
							<label for="">Year Graduated</label>
							<br>
							<input type="text" placeholder="Year Graduated" name="hyear">
						</div>
						</div>

						<div class="input_flex">
							<div class="input_list">
							<label for="">Tertiary Graduated</label>
							<br>
							<input type="text" placeholder="Tertiary Graduated" name="tgrad">
						</div>
						<div class="email">
							<label for="">Year Graduated</label>
							<br>
							<input type="text" placeholder="Year Graduated" name="tyear">
						</div>
						</div>
						<div class="input_flex">
							<div class="input_list">
							<label for="">Post Graduate</label>
							<br>
							<input type="text" placeholder="Post Graduated" name="pgrad">
						</div>
						<div class="email">
							<label for="">Year Graduated</label>
							<br>
							<input type="text" placeholder="Year Graduated" name="pyear">
						</div>
						</div>
							<div class="btn">
								<center><button type="submit" name="Register">Submit</button></center>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
		<?php
	}

?>

</body>
</html>