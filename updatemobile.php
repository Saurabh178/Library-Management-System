<?php

//start session
session_start();
include("connection.php");

//get details
$user_id = $_SESSION["user_id"];

if(!preg_match('/[0-9]/', $_POST["mobile"]) or strlen($_POST["mobile"]) !==10){
    echo "<div class='alert alert-danger'><strong>Mobile number entered is invalid, Please enter a valid number!</strong></div>";
    exit;
}
$mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);

//run query
$mobile = mysqli_real_escape_string($link, $mobile);
$sql = "UPDATE users SET mobile = '$mobile' WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
     echo "<div class='alert alert-danger'><strong>There was error in updating the user details in table.</strong></div>";
    exit;
}
else{
    echo '<div class="alert alert-success"><strong>Mobile Number has been successfully updated.</strong</div>';
}

?>