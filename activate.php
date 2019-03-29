
<?php

//user is redirected to this page after clicking on link
session_start();
include("connection.php");

?>


<!DOCTYPE html>

<html>
<head lang="en">
    <title>Account Activation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/flick/jquery-ui.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">

</head>
    
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Account Activation</h1>
<?php
            
//If email or activation key is missing show an error
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the activation link you received by email.</div>'; 
    exit;
}
            
    //Store them in two variables
$email = $_GET['email'];
$key = $_GET['key'];
            
    //Prepare variables for the query
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);
            
    //Run query: set activation field to "activated" for the provided email
$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);
            
    //If query is successful, show success message and invite user to login
if(mysqli_affected_rows($link) == 1){
    echo '<div class="alert alert-success">Your account has been activated.</div>';
    echo '<a href="index.php" type="button" class="btn-lg btn-sucess">Log in<a/>';
    
}
else{
    
    //Show error message
    echo '<div class="alert alert-danger">Your account could not be activated. Please try again later.</div>';
    
}
            
?>
         </div>
    </div>
</div>
    
</body>
</html>