<?php

//start session
session_start();
include("connection.php");
$user_id = $_SESSION["user_id"];

//file name
$name = $_FILES["image"]["name"];
$extension = pathinfo($name , PATHINFO_EXTENSION);
$tmp_name = $_FILES["image"]["tmp_name"];
$fileError = $_FILES["image"]["error"];

$permanentDestination = "profile/" . md5(time()) . ".$extension";
if(move_uploaded_file($tmp_name, $permanentDestination)){
    $sql = "UPDATE users SET profile_pic = '$permanentDestination' WHERE user_id = '$user_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Unable to update profile picture.Please try again later!</div>";
    }
    
}
else{
    echo "<div class='alert alert-danger'>Unable to update profile picture.Please try again later!</div>";
    }
if($fileError > 0){
    echo "<div class='alert alert-danger'>Unable to update profile picture.Please try again later!</div>";
    }

?>