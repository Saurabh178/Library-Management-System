<?php
//session start
session_start();
include('connection.php');

//get userid and new email
$user_id = $_SESSION['user_id'];
$newemail = $_POST['email'];

//check if new email exists
$sql = "SELECT * FROM users WHERE email='$newemail'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count > 0){
    echo "<div class='alert alert-danger'><strong>There is already a user registered with this email address, Please use another!</strong></div>";
    exit;
}

//get current email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $email = $row['email'];
}
else{
    echo "There was an error in getting email from database";
    exit;
}

//create activation code and insert in table
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "UPDATE users SET activation2='$activationKey' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'><strong>There was error in updating the user details in table.</strong></div>";
}
else{
    
    //send email to user with a link to activatenewemail.php with currentemail,new email and activation code
    $message = "Please click on this to change your email address :\n\n";
    $message .= "http://localhost/saurabh/HTML/Pro/activatenewemail.php?email=".urlencode($email). "&newemail=".urlencode($newemail). "&key=$activationKey";
    if(mail($newemail, 'Confirm your new email address', $message, 'From:'.'expert.saurabh178@gmail.com')){
    echo "<div class='alert alert-success'>Confirmation email has been sent to ".$newemail.".<br> Please click on link to change your email address.</div>";
    }
    else{
    echo "<div class='alert alert-danger'><strong>Failed to send, Please try again later!</strong></div>";
    }
    
}


?>