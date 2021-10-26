<?php
// require_once "core/function.php";
require_once 'connector/connect.php';
require_once "google/config.php";

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
        header("location: user");
        exit();
    }
    else{
        $_SESSION['fname'] = $userData->givenName;
        $_SESSION['lname'] = $userData->family_name;
        $_SESSION['email'] = $userData->email;
        header("location: form");
        exit();
    }
   
}
else{
    header('Location: index');
    exit();
}
?>
