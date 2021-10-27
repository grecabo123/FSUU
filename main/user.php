<?php  
    
    require 'connector/connect.php';
    session_start();
    if ($_SESSION['user_email']) {
        $email = $_SESSION['user_email'];
        $search = "SELECT *from profile";
        $result = mysqli_query($conn,$search);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Email'] == $email) {
                // $user_fname = $row['first_name'];
                // $user_mname = $row['middle_name'];
                // $user_lname = $row['last_name'];
                // $user_age = $row['age'];
                // $user_gender = $row['gender'];
                // $user_email = $row['Email'];
                // $user_contact = $row['contact'];
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
        $all_data_tbl = "SELECT p.ProfileID, p.first_name,p.middle_name,p.last_name,p.age,p.gender,p.Birthdate,p.Birthplace,p.Email,p.contact,adr.city,stu.course,stu.father_name,stu.mother_name,stu.parent_address,stu.StudentID,e.elementary_school_name,e.elementary_year_graduated,e.high_school_graduate,e.high_school_name,e.post_school_graduate,e.post_school_name,e.tertiary_school_graduate,e.tertiary_school_name from profile as p JOIN address as adr ON adr.ProfileID_fk = p.ProfileID JOIN student as stu ON stu.ProfileID_fk = p.ProfileID JOIN education as e ON e.Profile_fk = p.ProfileID WHERE p.ProfileID = $user_id";

            $result = mysqli_query($conn,$all_data_tbl);
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['ProfileID'];
                $user_fname = $row['first_name'];
                $user_mname = $row['middle_name'];
                $user_lname = $row['last_name'];
                $user_age = $row['age'];
                $user_gender = $row['gender'];
                $user_Birthdate = $row['Birthdate'];
                $user_Birthplace = $row['Birthplace'];
                $user_email = $row['Email'];
                $user_contact = $row['contact'];
                $user_city = $row['city'];
                $user_course = $row['course'];
                // $user_Year = $row['Year'];
                $user_father_name = $row['father_name'];
                $user_mother_name = $row['mother_name'];
                $user_parent_address = $row['parent_address'];
                $user_elementary_school_name = $row['elementary_school_name']; 
                $user_elementary_year_graduated = $row['elementary_year_graduated']; 
                $user_high_school_name = $row['high_school_name']; 
                $user_high_year_graduated = $row['high_school_graduate']; 
                $user_tertiary_school_name  = $row['tertiary_school_name'];
                $user_tertiary_year_graduated = $row['tertiary_school_graduate'];
                $user_post_school_name  = $row['post_school_name'];
                $user_post_year_graduated = $row['post_school_graduate']; 
                All_data($user_id,$user_fname,$user_mname,$user_lname,$user_age,$user_Birthdate,$user_Birthplace,$user_email,$user_contact,$user_city,$user_course,$user_father_name,$user_mother_name,$user_parent_address,$user_elementary_school_name,$user_elementary_year_graduated,$user_high_school_name,$user_high_year_graduated,$user_tertiary_school_name,$user_tertiary_year_graduated,$user_post_school_name,$user_post_year_graduated,$user_gender);
                break;

            }
    }

?>
<?php  
    function All_data($user_id,$user_fname,$user_mname,$user_lname,$user_age,$user_Birthdate,$user_Birthplace,$user_email,$user_contact,$user_city,$user_course,$user_father_name,$user_mother_name,$user_parent_address,$user_elementary_school_name,$user_elementary_year_graduated,$user_high_school_name,$user_high_year_graduated,$user_tertiary_school_name,$user_tertiary_year_graduated,$user_post_school_name,$user_post_year_graduated,$user_gender){
        ?>  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title><?php echo $user_fname." ".$user_lname; ?></title>
                <link rel="stylesheet" href="css/user.css">
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
                <!-- <link rel="stylesheet" href="css/form_box.css"> -->
            </head>
            <body>

            <div class="content">
                <div class="sidebar">
                    <a href="user" style="text-decoration: none;"><center><img src="image/1.png" alt="Logo" width="100" height="80"></center><center><span style="color: white; letter-spacing: 2px; font-size: 14px;">FATHER SATURNINO URIOS UNIVERSITY</span></center></a>
                    <ul>
                        <!-- <li><a href="#">Home</a></li> -->
                        <li><a href="#">Notification</a></li>
                         <li><a id="form" style="cursor: pointer;">Form</a></li> 
                        <li><a href="#">Action Done</a></li>
                        <li><a id="form-grad-course" style="cursor: pointer;">Document</a></li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul> 
                </div>
                <div class="main_content">
                    <div class="header">
                        <p><b>Name:&nbsp</b><span><?php echo $user_fname." ".$user_lname;?></span></p>
                    </div> 
                      <?php  

                        if (isset($_GET['form'])) {
                            if ($_GET['form'] == "submitted") {
                                ?>
                                <div class="display">
                                    <div class="submit">
                                        <div class="submit_box">
                                            <p>Form has been submitted</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            else if($_GET['form'] == "failed"){
                                ?>
                                <center><p style="color: red;font-size: 17px;">Failed to submit</p></center>
                                <?php
                            }
                        }

                        ?> 
        <div class="info">
             <!-- collegiate Form -->
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
                            <span>ID Number: <input type="text" required name="student_number"></span>
                        </div>
                        <br>
                        <!-- user information -->
                        <div class="user-info">
                            <label for="">
                                Course
                            </label>
                            <input type="text" placeholder="Course" required name="course">
                        </div>
                        <br>
                        <center><h3>Personal Information</h3></center>
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                    First Name
                                </label>
                                <input type="text" name="fname" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Middle Name
                                </label>
                                <input type="text" name="mname" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Last Name
                                </label>
                                <input type="text" name="lname" required>
                            </div>
                        </div>
                        <!-- <hr> -->
                        <div class="name">
                            <div class="user-info">
                                <label for="">
                                    Date of Birth
                                </label>
                                <input type="text" name="birthdate" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Place of Birth
                                </label>
                                <input type="text" name="place_birth" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Citizenship
                                </label>
                                <input type="text" name="citizenship" required>
                            </div>
                        </div>
                         <div class="name">
                            <div class="user-info">
                                <label for="">
                                    Sex
                                </label>
                                <input type="text" name="gender" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Civil Status
                                </label>
                                <input type="text" name="cstatus" required>
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
                        <div class="date">
                            <input type="date" name="date" required>
                        </div>
                        <br>
                        <div class="id-number">
                            <span>ID Number: <input type="text" name="student_number"></span>
                        </div>
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
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                    Mother's Name
                                </label>
                                <input type="text" name="nam" required>
                            </div>
                            <div class="user-info">
                                <label for="">
                                   Parent Address
                                </label>
                                <input type="text" name="nam" required>
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

        </div>
                  
      
        <?php
    }


?>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>