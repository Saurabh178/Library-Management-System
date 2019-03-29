<?php

//start session
session_start();
include("connection.php");

//define errors
$missingCurrentPassword = '<p><strong>Please enter your current password!</strong></p>';
$incorrectCurrentPassword = '<p><strong>Password entered is incorrect!</strong></p>';
$missingPassword = '<p><strong>Please enter new password</strong></p>';
$invalidPassword = '<p><strong>Password should be atleast 8 characters long with atleast one capital letter and one number.</strong></p>';
$differentPassword = '<p><strong>Password entered does not match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your Password!</strong></p>';
$errors = '';

//check and print error if any
if(empty($_POST['currentpassword'])){
    $errors .= $missingCurrentPassword;
}
else{
    $currentPassword = $_POST['currentpassword'];
    $currentPassword = filter_var($currentPassword, FILTER_SANITIZE_STRING);
    $currentPassword = mysqli_real_escape_string($link, $currentPassword);
    $currentPassword = hash('sha256',$currentPassword);
    
    //check if given password is correct
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT password FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo "<div class='alert alert-danger'><strong>There was a problem running the query></strong></div>";
    }
    else{
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($currentPassword != $row['password']){
            $errors .= $incorrectCurrentPassword;
        }
    }
}

if(empty($_POST["password"])){
    $errors .= $missingPassword;
}
elseif(!(strlen($_POST["password"])>7 and preg_match('/[A-Z]/',$_POST["password"]) and  preg_match('/[0-9]/',$_POST["password"]))){
    $errors .= $invalidPassword;
}
else{
    $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }
    else{
        $password2 = filter_var($_POST["password2"],FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//<!--Print Errors-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}


//run query and update password
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256',$password);
$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Password could not not be reset, Please try again later.</div>';
}
else{
    echo '<div class="alert alert-success"><strong>Password has been successfully updated.</strong</div>';
}


?>