<?php  

    include '../connector/connect.php';

    if (isset($_POST['view'])) {
        $key = mysqli_real_escape_string($conn,$_POST['key']); 

        $search = "SELECT *from collegiate WHERE student_id = $key";
        $result_query = mysqli_query($conn,$search);
        while ($rows = mysqli_fetch_assoc($result_query)) {
            $fname = $rows['first_name'];
            $lname = $rows['last_name'];
            $stud_id = $rows['student_id'];
            $email = $rows['email'];
            break;
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin </title>
	<link rel="stylesheet" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

<div class="content">
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a id="notification">Notification <span class="count">
                    <?php  

                    require '../connector/connect.php';

                    $sql = "SELECT count(*) as total from status_form";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['total'];
                        break;
                    }
                    if ($total ==0) {
                        ?>
                        <style>
                            .count{
                                display: none;
                            }
                        </style>
                    <?php
                    }
                    else {
                        echo $total;
                    }

                    ?>
                </span></a></li>
                <li><a href="#">Clearance Status</a></li>
                <li><a href="#">Approved Form</a></li>
            </ul>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
        	<p><b>Name:</b> <span>Alyssa Ave</span></p>
        </div>  
        <div class="info">
            <div class="search">
                <input type="text" placeholder="Search Name">
                <button><i class="fas fa-search"></i> Search</button>
            </div>
            <div class="table">

                <table width="100%">
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                     <?php  

                        require '../connector/connect.php';
                        $query = "SELECT *from collegiate";
                        $result = mysqli_query($conn,$query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr align="center">
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>Pending</td>
                        <td>
                            <div class="icon">
                                <ul>
                                    <!-- <form method="post" autocomplete="off"> -->
                                        <input type="hidden" name="key" value="<?php echo $row['student_id']; ?>">
                                        <li><button id="view" name="view" onclick="display(<?php echo $row['student_id']; ?>)" title="<?php echo $row['student_id']; ?>"><i class="fas fa-eye"></i></button></li>
                                    <!-- </form> -->
                                    <li><button id="forward" title="Forward"><i class="fas fa-share-square"></i></button></li>
                                    <li><button id="msg" title="Message"><i class="far fa-envelope-open"></i></button></li>
                                    <form id="form" action="delete" method="post">
                                        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                                        <li><button id="delete" title="<?php echo $row['student_id']; ?>" type="submit" name="delete"><i class="fas fa-trash"></i></button></li>
                                    </form>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                        <!-- <td><input type="checkbox"></td> -->
                   
                </table>
            </div>
        </div>

        <!-- Form View -->
        <div class="view-data">
            <div class="form">
                <div class="form_box">
                    <form action="">
                        <center><h3>Data</h3></center>
                        <br>
                        <label for="">
                            Name:
                        </label>
                        <input type="text" placeholder="" value="<?php echo $lname.' '.$fname; ?>">
                        <label for="">
                            Student #:
                        </label>
                        <input type="text" placeholder="" value="<?php echo $stud_id; ?>">
                        <label for="">
                            Email:
                        </label>
                        <input type="text" placeholder="" value="<?php echo $email; ?>">
                        <button id="approve"><i class="fas fa-thumbs-up"></i> Approve</button>
                        <button id="dis-approve"><i class="fas fa-thumbs-down"></i> UnApprove</button>
                    </form>
                    <span id="close" title="close"><i class="fas fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- end of form view -->

    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/fontawesome.js"></script>


    <script type="text/javascript">
        
        function display(data){

            <?php  

                

            ?>
        }

    </script>


</body>
</html>
