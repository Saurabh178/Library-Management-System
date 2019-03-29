<?php

//start a session
session_start();
include("connection.php");

//define errors
$missingUsername = "<p><strong>Please enter Username!</strong></p>";
$missingPassword = "<p><strong>Please enter your password to login!</strong></p>";
$errors = '';

//get username and password
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}
else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;
}
else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}

//print errors, if any
if($errors){
    $resultMessage = "<div class='alert alert-danger'>" . $errors . "</div>";
    echo $resultMessage;
    exit;
}

//if no error, then run query
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

$sql = "SELECT * FROM staff WHERE (username = '$username' AND password = '$password')";
$result = mysqli_query($link, $sql);

if(!$result){
    echo "<div class='alert alert-danger'><strong>Error running in query</strong></div>";
    exit;
}
$count = mysqli_num_rows($result);
if($count !== 1){
    echo "<div class='alert alert-danger'><strong>Wrong Username or Password</strong></div>";
}
else{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION["staff_id"] = $row["staff_id"];
    $_SESSION["username"] = $row["username"];
    echo "success";
}


?>