<?php
// require_once "core/function.php";
require_once 'connector/connect.php';
require_once "google/config_admin.php";

if (isset($_GET['code'])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
}
else{
    header('Location: index');
    exit();
}
if(isset($token["error"]) != "invalid_grant"){
    
    $google_client->setAccessToken($token['access_token']);

    $_SESSION['access_token'] = $token['access_token'];

    $oAuth = new Google_Service_Oauth2($google_client);
    $userData = $oAuth->userinfo_v2_me->get();

    session_start();
    // $_SESSION['google_email'] = $userData['email'];

    $fname = mysqli_real_escape_string($conn,$userData->givenName);
    $lname = mysqli_real_escape_string($conn,$userData->family_name);
    $email = mysqli_real_escape_string($conn,$userData->email);

    // picture from google account.
    $pic = mysqli_real_escape_string($conn,$userData->picture);

    // session_start();
    $sql = "SELECT Email from profile WHERE Email ='$email'";
    $result= mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // if existed
        $_SESSION['user_email'] = $userData->email;
        header("location: admin/admin");
        exit();
    }
    else{
         $type = "Admin";
        $sql = "INSERT INTO profile(first_name,middle_name,last_name,age,gender,Birthdate,Birthplace,Email,contact) VALUES ('$fname',null,'$lname',null,null,null,null,'$email',null)";
        if (mysqli_query($conn,$sql) === TRUE) {
            $id = mysqli_insert_id($conn);
            $account_type = "INSERT INTO account_type(account_type,account_type_approver,account_type_requester,ProfileID_fk) VALUES('$type',null,null,$id)";
            if (mysqli_query($conn,$account_type) === TRUE) {
                $address = "INSERT INTO address(city,ProfileID_fk) VALUES(null,$id)";
                if (mysqli_query($conn,$address) === TRUE) {
                    $address_fk = mysqli_insert_id($conn);
                    $office = "INSERT INTO office (office_name,assigned) VALUES (null,null)";
                    if (mysqli_query($conn,$office) === TRUE) {
                        $office_fk = mysqli_insert_id($conn);
                        $employee_tbl = "INSERT INTO employee (department,person_position,OfficeID_fk,AddressID_fk,ProfileID_fk) VALUES (null,null,$office_fk,$address_fk,$id)";
                        if (mysqli_query($conn,$employee_tbl) === TRUE) {
                            $clearance_status = "INSERT INTO clearance_status(status_type,ProfileID_fk) VALUES(null,$id)";
                            if (mysqli_query($conn,$clearance_status) === TRUE) {
                                $clearance_year = "INSERT INTO clearance_year (date_time) VALUES (NOW())";
                                if (mysqli_query($conn,$clearance_year) === TRUE) {
                                    $clearance_fk = mysqli_insert_id($conn);
                                    $attach_tbl = "INSERT INTO attachments (file_name,file_link,attachment_type,file_directory,ProfileID_fk,ClearanceTermID__fk) VALUES (null,null,null,null,$id,$clearance_fk)";
                                    if (mysqli_query($conn,$attach_tbl) === TRUE) {
                                         $_SESSION['user_email'] = $userData->email;
                                        header("location: admin/admin");
                                        exit();
                                    }   
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
else{
    print_r($token);
}
?>
