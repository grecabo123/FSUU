<?php  
    
    require 'connector/connect.php';
    session_start();
    if ($_SESSION['user_email']) {
        $email = $_SESSION['user_email'];
        $search = "SELECT *from profile";
        $result = mysqli_query($conn,$search);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Email'] == $email) {
                $user_id = $row['ProfileID'];
                Search_data($user_id);
                break;
            }
        }
    }
    else {
        header("location: index");
        exit();
    }

?>
<?php  
    
    function Search_data($user_id){
        require 'connector/connect.php';
        $all_data_tbl = "SELECT p.ProfileID,p.contact,p.first_name,p.middle_name,p.last_name,p.url_img,p.Birthdate,p.Birthplace,p.Email,a.city,b.file_name,b.file_link,b.attachment_type,b.file_directory,c.status_type,e.department,e.person_position,stu.Student_id,stu.father_name,stu.mother_name,stu.parent_address,stu.course from profile as p JOIN address as a ON a.ProfileID_fk = p.ProfileID JOIN attachments as b ON b.ProfileID_fk = p.ProfileID JOIN clearance_status as c ON c.ProfileID_fk = p.ProfileID JOIN employee as e ON e.ProfileID_fk = p.ProfileID JOIN student as stu ON stu.ProfileID_fk = p.ProfileID  WHERE p.ProfileID = $user_id";

            $result = mysqli_query($conn,$all_data_tbl);
            while ($row = mysqli_fetch_assoc($result)) {
             	$user_id = $row['ProfileID'];
             	$user_email = $row['Email'];
                $user_fname = $row['first_name'];
                $user_mname = $row['middle_name'];
                $user_lname = $row['last_name'];
                $user_contact = $row['contact'];
                $user_city = $row['city'];
                $user_file_name = $row['file_name'];
                $user_file_link = $row['file_link'];
                $user_attachment_type = $row['attachment_type'];
                $user_file_directory = $row['file_directory'];
                $user_status_type = $row['status_type'];
                $user_department = $row['department'];
                $user_position = $row['person_position'];
                $user_img = $row['url_img'];
                $user_student_id = $row['Student_id'];
                $user_father_name = $row['father_name'];
                $user_mother_name = $row['mother_name'];
                $user_parent_address = $row['parent_address'];
                $user_course = $row['course'];
                $user_birthdate = $row['Birthdate'];
                $user_birth_place = $row['Birthplace'];
                All_data($user_id,$user_fname,$user_mname,$user_lname,$user_contact,$user_city,$user_file_name,$user_file_link,$user_file_directory,$user_attachment_type,$user_status_type,$user_department,$user_position,$user_img,$user_student_id,$user_father_name,$user_mother_name,$user_parent_address,$user_course,$user_birthdate,$user_birth_place,$user_email);
                break;

            }
    }

?>

<?php  
    function All_data($user_id,$user_fname,$user_mname,$user_lname,$user_contact,$user_city,$user_file_name,$user_file_link,$user_file_directory,$user_attachment_type,$user_status_type,$user_department,$user_position,$user_img,$user_student_id,$user_father_name,$user_mother_name,$user_parent_address,$user_course,$user_birthdate,$user_birth_place,$user_email){
        ?>  
			<!DOCTYPE html>
			<html>
			<head>
			    <meta charset="utf-8">
			    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <title><?php echo $user_fname. " ".$user_lname; ?></title>
			    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
			    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
			    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
			    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
			    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
			    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
			    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

                <script type="text/javascript" src="js/fontawesome.js"></script>
			    <link rel="stylesheet" href="css/style.css">
			    <link rel="stylesheet" href="css/modal.css">
			    <link rel="stylesheet" href="css/user.css">
                <link rel="stylesheet" href="css/profile.css">
            <link rel="stylesheet" href="css/form.css">
                <link rel="stylesheet" href="admin/css/content.css">
			</head>
			<body>
			    <div id="color">
			        <a href="temporary"><img id="logo" src="image/fsuu.png" alt="LOGO" width="250" height="70"></a>
			        <div class="list_att">
			            <ul>
			                <li><img src="<?php echo $user_img; ?>" alt="" width="40" height="40" style="border-radius: 50%"> &nbsp<span style="color: white; cursor: pointer;" onclick="window.location='temporary'">Name: <?php echo $user_fname. " ".$user_lname; ?> </span></li>
			                
			                <li><a href="logout"><img src="icon/power-off-solid.svg" alt="Icon" width="20" height="20" title="Logout"></a></li>
			            </ul>
			        </div>
			    </div>

				<!-- header -->
			    <header>
			        <div class="head">
			            <div class="list">
			                <ul>
                                <li><a href="#" id="account-info">My Account</a></li>
                                <li><a href="#" id="form">Collegiate Form</a></li>
			                    <li><a href="#" id="form-grad">Graduate Form</a></li>
			                    <li><a href="http://www.urios.edu.ph/index.php/en/" id="">Fsuu Website</a></li>
			                </ul>
			            </div>
			        </div>
			    </header>
			    <!-- end of header -->

                    <!-- content -->

        <div class="none">
            <div class="content">
            <div class="content-size">
                <div class="box-content">
                    <!-- <div class="calendar">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Dolores sit voluptatem sint magnam fuga, sunt sapiente magni dolore blanditiis quam aut, consectetur enim quo fugit ducimus, maxime deleniti? Magnam, ducimus.</p>
                    </div> -->
                    <div class="profile">
                        <div class="form">
                <div class="box">
                    <form action="update" method="post" autocomplete="off">
                        <center><span>Personal Information</span></center>
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
                                <input type="text" placeholder="First Name" name="fname" value="<?php echo $user_fname; ?>">
                            </div>
                            <div class="name">
                                <input type="text" placeholder="Middle Name" name="mname" value="<?php echo $user_mname; ?>">
                            </div>
                            <div class="name">
                                <input type="text" placeholder="Last Name" name="lname" value="<?php echo $user_lname; ?>">
                            </div>  
                        </div>
                        <div class="fname">
                            <div class="name">
                                <input type="text" placeholder="Year Level" name="year" value="<?php  ?>">
                                
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
                                <input type="text" placeholder="Email" readonly value="<?php echo $user_email; ?>">
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

                    </div>
                </div>
            </div>
        </div>

        </div>
    <!-- end of content -->




				 <div class="form-grad">
                    <div class="graduate-form">
                      <div class="box-size">
                        <form action="submit" method="post">
                            <div class="box_size">
                            <ul>
                                <li><center><h3>Father Saturnino Urios University</h3></center></li>
                                <li><center><span>Collegiate Form</span></center></li>
                            </ul>
                            </div>
                        <div class="date">
                            <input type="hidden" name="pk" value="<?php echo $user_id; ?>">
                            <!-- <input type="date" name="date"> -->
                        </div>
                        <br>
                        <div class="id-number" style="float: right;">
                            <input type="hidden" name="email" value="<?php echo $user_email; ?>">
                            <span>ID Number: <input type="text"  required name="student_number" maxlength="11" value="<?php echo $user_student_id; ?>"></span>
                        </div>
                        <br>
                        <!-- user information -->
                        <div class="user-info">
                            <label for="">
                                Course
                            </label>
                            <input type="text"  placeholder="Course" required name="course" value="<?php echo $user_course;; ?>">
                        </div>
                        <br>
                        <center><h3>Personal Information</h3></center>
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                    First Name
                                </label>
                                <input type="text" name="fname" required value="<?php echo $user_fname; ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Middle Name
                                </label>
                                <input type="text" name="mname" required value="<?php echo $user_mname; ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Last Name
                                </label>
                                <input type="text" name="lname" required value="<?php echo $user_lname; ?>">
                            </div>
                        </div>
                        <!-- <hr> -->
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                    Date of Birth
                                </label>
                                <input type="text" name="birthdate" required value="<?php echo $user_birthdate; ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Place of Birth
                                </label>
                                <input type="text" name="place_birth" required value="<?php echo $user_birth_place; ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Citizenship
                                </label>
                                <input type="text" name="citizenship" required value="<?php  ?>">
                            </div>
                        </div>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                    Sex
                                </label>
                                <input type="text" name="gender" required value="<?php  ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Civil Status
                                </label>
                                <input type="text" name="cstatus" required value="<?php  ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Name of Spouse if Married
                                </label>
                                <input type="text" name="spouse" required>
                            </div>
                        </div>
                        <div class="user-info">
                                <label for="">
                                    Home Address
                                </label>
                                <input type="text" name="home_address" required>
                            </div>
                            <hr>
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                   Father's Name
                                </label>
                                <input type="text" name="father_name" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Mother's Name
                                </label>
                                <input type="text" name="mother_name" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Parent Address
                                </label>
                                <input type="text" name="parent_address" required>
                            </div>
                        </div>
                        <br>
                        <center><h3>Education Background</h3></center>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                   Elementary School Graduated
                                </label>
                                <input type="text" name="eschool" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                  Year Graduated
                                </label>
                                <input type="text" name="eyear" required>
                            </div>
                        </div>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                   High School Graduated
                                </label>
                                <input type="text" name="hschool" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Year Graduated
                                </label>
                                <input type="text" name="hyear" required>
                            </div>
                        </div>
                        <div class="btn">
                            <center><button type="submit" name="Submit">Submit Form</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end of collegiate form -->


        <!-- Graduate course -->
           <div class="form-grad-course">
                    <div class="graduate-form">
                      <div class="box-size">
                        <form action="" method="post">
                            <div class="box_size">
                            <ul>
                                <li><center><h3>Father Saturnino Urios University</h3></center></li>
                                <li><center><span>Graduate Course</span></center></li>
                            </ul>
                            </div>
                        <div class="id-number" style="float: right;">
                            <input type="hidden" name="email" value="<?php echo $user_email; ?>">
                            <span>ID Number: <input type="text" required name="student_number" maxlength="11"></span>
                        </div>
                        <br>
                        <br>
                        <!-- user information -->
                        <div class="user-info">
                            <label for="">
                                Course
                            </label>
                            <input type="text" placeholder="Course" name="nam" required>
                        </div>
                        <center><h3>Personal Information</h3></center>
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                    First Name
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Middle Name
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Last Name
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                        <!-- <hr> -->
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                    Date of Birth
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Place of Birth
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Citizenship
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                    Sex
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Civil Status
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Name of Spouse if Married
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                        <div class="user-info">
                                <label for="">
                                    Home Address
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <hr>
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                   Father's Name
                                </label>
                                <input type="text" name="nam" required value="<?php echo $user_father_name; ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Mother's Name
                                </label>
                                <input type="text" name="nam" required value="<?php echo $user_mother_name; ?>">
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Parent Address
                                </label>
                                <input type="text" name="nam" required value="<?php echo $user_parent_address; ?>">
                            </div>
                        </div>
                        <br>
                        <center><h3>Education Background</h3></center>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                   Elementary School Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                  Year Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                   High School Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Year Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                   Tertiary Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Year Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                          <div class="name">
                            <div class="user-info">
                                <label for="">
                                   Post Graduate
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Year Graduated
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                        </div>
                        <div class="btn">
                            <center><button>Submit Form</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>

			    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
			    <script type="text/javascript" src="js/load.js"></script>

			</body>
			</html>
        <?php
    }
?>

