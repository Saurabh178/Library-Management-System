<?php

//start a session
session_start();
include("connection.php");

//define errors and get values
$missingEmail = "<p><strong>Please enter email!</strong></p>";
$InvalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$errors = '';

if(empty($_POST["forgotemail"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $InvalidEmail;
    }
}

//print error
if($errors){
    $resultMessage = "<div class='alert alert-danger'>" . $errors . "</div>";
    echo $resultMessage;
    exit;
}

//if no error, then run query
$email = mysqli_real_escape_string($link, $email);

//query for checking if email exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger"><strong>Error running in query</strong></div>';
    exit;
}
$count = mysqli_num_rows($result);
if($count !== 1){
    echo '<div class="alert alert-danger"></strong>This Email does not exists in our database!</strong></div>';
    exit;
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['user_id'];

//create activation key and insert into table
$key = bin2hex(openssl_random_pseudo_bytes(16));
$time = time();
$status = "pending";
$sql = "INSERT INTO forgotpassword (`user_id`, `resetkey`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger"><strong>Error in inserting the details in database.</strong></div>';
    exit;
}

//<!--send user a mail to reset password-->
$message = "Please click on this link to reset your password:\n\n";
$message .= "http://localhost/saurabh/HTML/Pro/resetpassword.php?user_id=$user_id&key=$key";

if(mail($email, 'Reset your Password', $message, 'From:'.'expert.saurabh178@gmail.com')){
    echo "<div class='alert alert-success'>Thank you for registering!<br>Confirmation email has been sent to ".$email.". Please click on link to reset your password.</div>";
}
else{
    echo "<div class='alert alert-danger'><strong>Failed to send, Please try again later!</strong></div>";
}


?>