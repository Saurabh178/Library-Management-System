<?php

//create a session
session_start();
include("connection.php");

//define various errors
$missingUsername = "<p><strong>Please enter your username!</strong><p>";
$missingEmail = "<p><strong>Please enter an email!</strong><p>";
$invalidEmail = "<p><strong>Please enter a valid email address!</strong><p>";
$missingPassword = "<p><strong>Please enter a Password!</strong><p>";
$invalidPassword = "<p><strong>Please enter valid Password:It should include atleast one capital letter, one number and contain atleast 8 characters!</strong></p>";
$missingPassword2 = "<p><strong>Please Re-enter your Password!</strong><p>";
$differentPassword = "<p><strong>Password did't match!</strong><p>";
$missingMobile = "<p><strong>Please enter your mobile number!</strong><p>";
$invalidMobile = "<p><strong>Please enter valid mobile number!</strong><p>";
$missingDOB = "<p><strong>Please enter your date of birth!</strong><p>";
$errors = "";

//get details of various errors
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}
else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}
elseif(!(strlen($_POST["password"]) > 7 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"])))
{
    $errors .= $invalidPassword;
}
else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }
    else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
if(empty($_POST["mobile"])){
    $errors .= $missingMobile;
}
elseif(!preg_match('/[0-9]/', $_POST["mobile"]) or strlen($_POST["mobile"]) !==10){
    $errors = $invalidMobile; 
}
else{
    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);
}
if(empty($_POST["dob"])){
    $errors .= $missingDOB;
}
else{
    $dob = $_POST["dob"];
}
$gender = $_POST["gender"];

//print errors
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

$internet_connection = @fsockopen("www.google.com",80);
if($internet_connection)
{
       
//variables for query and checking existence of record
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$mobile = mysqli_real_escape_string($link, $mobile);
$dob = mysqli_real_escape_string($link, $dob);
$gender = mysqli_real_escape_string($link, $gender);
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256', $password);

//run query
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error in running query</div>";
    exit;
}
$count = mysqli_num_rows($result);
if($count){
    echo "<div class='alert alert-danger'>This username already exists, Do you want to login?</div>";
    exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error in running query</div>";
    exit;
}
$count = mysqli_num_rows($result);
if($count){
    echo "<div class='alert alert-danger'>This email already registered, Please use another email!</div>";
    exit;
}

//create activation code
$activationkey = bin2hex(openssl_random_pseudo_bytes(16));

//enter details in table
$sql = "INSERT INTO users (`username`, `email`, `password`, `mobile`, `dob`, `gender`, `activation`) VALUES ('$username', '$email', '$password', '$mobile', '$dob', '$gender', '$activationkey')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error in running query</div>";
    exit;
}

//send user a mail for activation
$message = "Please click on this to activate your account:\n\n";
$message .= "http://localhost/saurabh/HTML/Pro/activate.php?email=".urlencode($email)."&key=$activationkey";

if(mail($email, 'Confirm your Registraion', $message, 'From:'.'expert.saurabh178@gmail.com')){
    echo "<div class='alert alert-success'>Thank you for registering!<br>Confirmation email has been sent to ".$email.". Please activate your account to proceed further.</div>";
}
else{
    echo "<div class='alert alert-danger'><strong>Failed to send, Please try again later!</strong></div>";
}

}
else{
	echo "<div class='alert alert-danger'><strong>Failed to send, Please Connect to Network!</strong></div>";
}


?>