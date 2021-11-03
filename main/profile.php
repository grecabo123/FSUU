<?php  

	require 'connector/connect.php';
    session_start();

    $email = $_SESSION['user_email'];

    $sql = "SELECT *from profile WHERE Email = '$email'";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
    	$id = $row['ProfileID'];
        $fname = $row['first_name'];
        $mname = $row['middle_name'];
        $lname = $row['last_name'];
        $age = $row['age'];
        $gender = $row['gender'];
        $birthdate = $row['Birthdate'];
        $birt_place = $row['Birthplace'];
        $email = $row['Email'];
        $contact = $row['contact'];
        Account_data($fname,$mname,$lname,$age,$gender,$birthdate,$birt_place,$email,$id);
        break;
    }
    //echo $fname;
?>


<?php  
	
	function Account_data($fname,$mname,$lname,$age,$gender,$birthdate,$birt_place,$email,$id){
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title></title>
			<link rel="stylesheet" href="css/profile.css">
			<link rel="stylesheet" href="css/form.css">
			<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
		</head>
		<body>


		<!-- header -->
			<header>
				<div class="head">
					<a href="temporary"><span>Back</span></a>
				</div>
			</header>
			<!-- end od header -->
			<br>

			<!-- table -->

			<div class="form">
				<div class="box">
					<form action="update" method="post" autocomplete="off">
						<center><span>My Account</span></center>
						<div class="id">
							<input type="text" placeholder="Student ID" name="stud_id">
							<input type="hidden" placeholder="id" name="key" value="<?php echo $id; ?>">
						</div>
						<div class="id">
						<?php  

						require 'connector/connect.php';
						$sql = "SELECT *FROM course";
						$result = mysqli_query($conn,$sql);
						if (mysqli_num_rows($result) > 0) {
							echo "<select id='gender' name='course'>";
							while ($row = mysqli_fetch_assoc($result)) {
							    echo  "<option value=".$row['Course'].">".$row['Course']. "</option>";
							}
							echo "</select>";
						}
						
					?>
						</div>
						<div class="fname">
							<div class="name">
								<input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
							</div>
							<div class="name">
								<input type="text" placeholder="Middle Name" name="mname">
							</div>
							<div class="name">
								<input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
							</div>	
						</div>
						<div class="fname">
							<div class="name">
								<input type="text" placeholder="Year Level" name="year">
								
							</div>
							<div class="name">
								<input type="text" placeholder="Gender" name="sex">
							</div>
							<div class="name">
								<input type="text" placeholder="Birthdate" name="birthdate">
							</div>	
						</div>
						<div class="fname">
							<div class="name">
								<input type="text" placeholder="Birthplace" name="birth_place">
							</div>
							<div class="name">
								<input type="text" placeholder="Age" name="age">
								
							</div>
							<div class="name">
								<input type="text" placeholder="Address" name="adr">
							</div>	
						</div>
						<div class="fname">
							<div class="name">
								<input type="text" placeholder="Civil Status" name="status">
							</div>
							<div class="name">
								<input type="text" placeholder="Email" disabled readonly value="<?php echo $email; ?>">
							</div>
							<div class="name">
								<input type="text" placeholder="Home Address" name="home_adr">
							</div>	
						</div>
						<div class="fname">
							<div class="name">
								<input type="text" placeholder="Name of Spouse" name="spouse">
							</div>
							<div class="name">
								<input type="text" placeholder="Citizenship" name="citizen">
							</div>
							<div class="name">
								<input type="text" placeholder="Contact" name="contact">
							</div>	
						</div>
						<div class="fname">
							<div class="name">
								<input type="text" placeholder="Father Name" name="father_name">
							</div>
							<div class="name">
								<input type="text" placeholder="Mother Name" name="mother_name">
							</div>
							<div class="name">
								<input type="text" placeholder="Parent Address" name="parent_adr">
							</div>	
						</div>
						<div class="btn">
							<center><button type="submit" name="update">Update</button></center>
						</div>
					</form>
				</div>
			</div>

			<!-- end of table -->



		<?php
	}

?>



	
</body>
</html>