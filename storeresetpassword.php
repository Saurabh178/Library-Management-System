<?php
session_start();
include('connection.php');

if(!isset($_POST['user_id']) || !isset($_POST['key'])){
    echo "<div class='alert alert-danger act'><strong>ERROR: Please click on link to reset your password.</strong></div>";
    exit;
}

//setting variable and running query
$user_id = $_POST['user_id'];
$key = $_POST['key'];
$time = time() - 86400;

$user_id = mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);

$sql = "SELECT user_id FROM forgotpassword WHERE resetkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger act'><strong>Error running in query.</strong></div>";
    exit;
}
                
//if combination does not exist
$count = mysqli_num_rows($result);
if($count !== 1)
{
    echo "<div class='alert alert-danger act'><strong>Please try again.</strong></div>";
    exit;
}

//define error messages
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$InvalidPassword = '<p><strong>Please enter valid Password:It should include atleast one capital letter, one number and contain atleast 8 characters!</strong></p>';
$differentPassword = '<p><strong>Password didn\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Confirm your Password</strong></p>';
$errors = '';

if(empty($_POST["password"])){
    $errors .= $missingPassword;
}
elseif(!(strlen($_POST["password"])>7 and preg_match('/[A-Z]/',$_POST["password"]) and  preg_match('/[0-9]/',$_POST["password"]))){
    $errors .= $InvalidPassword;
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

$password = mysqli_real_escape_string($link,$password);
$password = hash('sha256', $password);
$user_id = mysqli_real_escape_string($link,$user_id);

//Run query to update details
$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error: There was problem in storing new password. </div>";
    exit;
}

//set status as used
$sql = "UPDATE forgotpassword SET status='used' WHERE resetkey='$key' AND user_id='$user_id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query. </div>";
    exit;
}

echo "<div class='alert alert-success'><strong>Your password updated succesfully!<a href='index.php'>Login</a></strong><div>";


?>