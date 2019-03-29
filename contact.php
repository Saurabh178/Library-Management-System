<?php

//start session
session_start();
include("connection.php");

//define errors
$missingUsername = "<p>Please Enter Username!</p>";
$missingEmail = "<p>Please Enter Email Address!</p>";
$invalidEmail = "<p>Please Enter valid Email Address!</p>";
$missingMobile = "<p>Please Enter your Contact Number!</p>";
$invalidMobile = "<p>Please Enter valid Contact Number!</p>";
$missingQuery = "<p>Please Enter your query!</p>";
$errors = "";

if(empty($_POST["contactusername"])){
    $errors .= $missingUsername;
}
else{
    $username = filter_var($_POST["contactusername"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["contactemail"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["contactemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
    
}
if(empty($_POST["contactnumber"])){
    $errors .= $missingMobile;
}
elseif(!preg_match('/[0-9]/', $_POST["contactnumber"]) or strlen($_POST["contactnumber"]) !==10){
    $errors = $invalidMobile; 
}
else{
    $mobile = filter_var($_POST["contactnumber"], FILTER_SANITIZE_NUMBER_INT);
}
if(empty($_POST["contacttext"])){
    $errors .= $missingQuery;
}
else{
    $query = filter_var($_POST["contacttext"], FILTER_SANITIZE_STRING);
}

//print errors
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}
$admin_email = "expert.saurabh178@gmail.com";

$message = "$query\n\n";
$message .= "<strong>Details:</strong> \n\nName- $username \n\nMobile No.- $mobile \n\nEmail- $email \n\n";
$message .= "Thank You";

if(mail($admin_email, "Query and Message", $message, "From:"."expert.saurabh178@gmail.com")){
    echo "<div class='alert alert-success'><strong>Thank you for your query, We will reply you Soon!</strong></div>";
}
else{
    echo "<div class='alert alert-danger'><strong>Failed to send, Please try again later!</strong></div>";
}


?>