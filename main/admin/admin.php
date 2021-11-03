<?php  
    
    require '../connector/connect.php';
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
        require '../connector/connect.php';
        $all_data_tbl = "SELECT p.ProfileID,p.contact,p.first_name,p.middle_name,p.last_name,p.url_img,p.Birthdate,p.Birthplace,a.city,b.file_name,b.file_link,b.attachment_type,b.file_directory,c.status_type,e.department,e.person_position,stu.Student_id,stu.father_name,stu.mother_name,stu.parent_address,stu.course from profile as p JOIN address as a ON a.ProfileID_fk = p.ProfileID JOIN attachments as b ON b.ProfileID_fk = p.ProfileID JOIN clearance_status as c ON c.ProfileID_fk = p.ProfileID JOIN employee as e ON e.ProfileID_fk = p.ProfileID JOIN student as stu ON stu.ProfileID_fk = p.ProfileID  WHERE p.ProfileID = $user_id";

            $result = mysqli_query($conn,$all_data_tbl);
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['ProfileID'];
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
                All_data($user_id,$user_fname,$user_mname,$user_lname,$user_contact,$user_city,$user_file_name,$user_file_link,$user_file_directory,$user_attachment_type,$user_status_type,$user_department,$user_position,$user_img,$user_student_id,$user_father_name,$user_mother_name,$user_parent_address,$user_course,$user_birthdate,$user_birth_place);
                break;

            }
    }

?>

<?php  
    function All_data($user_id,$user_fname,$user_mname,$user_lname,$user_contact,$user_city,$user_file_name,$user_file_link,$user_file_directory,$user_attachment_type,$user_status_type,$user_department,$user_position,$user_img,$user_student_id,$user_father_name,$user_mother_name,$user_parent_address,$user_course,$user_birthdate,$user_birth_place){
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
                <script type="text/javascript" src="../js/fontawesome.js"></script>
                <link rel="stylesheet" href="../css/style.css">
                <link rel="stylesheet" href="../css/modal.css">
                <link rel="stylesheet" href="../css/user.css">
                <link rel="stylesheet" href="css/notification.css">

            </head>
            <body>
                <div id="color">
                    <a href="admin"><img id="logo" src="../image/fsuu.png" alt="LOGO" width="250" height="70"></a>
                    <div class="list_att">
                        <ul>
                            <li><img src="<?php echo $user_img; ?>" alt="" width="40" height="40" style="border-radius: 50%"> &nbsp<span style="color: white; cursor: pointer;" onclick="window.location='admin'">Name: <?php echo $user_fname. " ".$user_lname; ?> </span></li>
                            <li><span onclick="window.location = 'profile'"><img src="../icon/user-cog-solid.svg" alt="Logo" width="20" height="20" style="cursor: pointer;" title="Account Settings"></span></li>
                            <li><a href="../logout"><img src="../icon/power-off-solid.svg" alt="Icon" width="20" height="20" title="Logout"></a></li>
                        </ul>
                    </div>
                </div>
                <!-- header -->
                <header>
                    <div class="head">
                        <div class="list">
                            <ul>
                                <li><button title="Report" id="report"> <img id="beel" src="../icon/bell-solid.svg" alt="LOGO" width="30" height="30">
                                <span class="noti"></span></button></li>
                                <li><button style="cursor: pointer;" title="Employee"><img src="../icon/employee.svg" alt="Employee" width="30" height="30"><span class="employee-notification"></span></button></li>
                                <li><button style="cursor: pointer;" title="Students"><img src="../icon/download.png" alt="Employee" width="30" height="30"><span class="student-notification"></span></button></li>
                            </ul>
                        </div>
                    </div>
                </header>
                <!-- end of header -->

    <!-- msg box-->
    <div class="msg">
        <section>
            <div class="color">
                <center><span>Name of Requester</span></center>
            </div>
            <div class="center">
                <div class="box_txt">
                <ul class="result">
                    
                </ul>
            </div>
            </div>
            <span id="close_msg"><img src="../icon/times-solid.svg" alt="" width="20" height="20"></span>
        </section>
    </div>
    <!-- end of msg box -->

     <div class="data">
         <div class="table">
        <div class="table_size">
            <table width="100%">
                <tr>
                    <th id="head" colspan="5">Data</th>
                </tr>
                <tr>
                    <th>ID Number</th>
                    <th>Name of Person</th>
                    <th>Action</th>
                </tr>
                <tr align="center" class="data-result">
                    <td class="student"></td>
                    <td class="td-name"></td>
                    <td class="list-btn">
                        
                    </td>
                </tr>
                
            </table>
            <span id="close_tbl"><i class="fas fa-times"></i></span>
        </div>
    </div>
    </div>

                <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
                <script type="text/javascript" src="js/admin.js"></script>

            </body>
            </html>
        <?php
    }


?>