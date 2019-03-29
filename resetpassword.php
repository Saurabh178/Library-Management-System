<?php
session_start();
include("connection.php");

?>

<!DOCTYPE html>

<html>
<head lang="en">
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/flick/jquery-ui.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <style>
        h1{
            color: blue;
            text-align: center;
        }
        .account{
            border: 2px solid black;
            margin-top: 50px;
            border-radius: 15px;
        }
        .act{
            text-align: center;
        }
        
        
    </style>
    
</head>
    
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 account">
                <h1>Reset Password</h1>
                
                
                <div id='resultmessage'></div>
                <?php
                //checking user_id and key
if(!isset($_GET['user_id']) || !isset($_GET['key'])){
    echo "<div class='alert alert-danger act'><strong>ERROR: Please click on link to reset your password.</strong></div>";
    exit;
}

//setting variable and running query
$user_id = $_GET['user_id'];
$key = $_GET['key'];
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
//print reset password form
echo "
<form method='post' id='passwordreset'>
<input type='hidden' name='key' value='$key'>
<input type='hidden' name='user_id' value='$user_id'>
<div class='form-group input-group'>
    <label for='password'></label>
    <span class='input-group-addon'>
        <span class='glyphicon glyphicon-lock'></span>
    </span>
    <input type='password' name='password' id='password' placeholder='Enter Password' class='form-control'>
</div>
<div class='form-group input-group'>
    <label for='password2'></label>
    <span class='input-group-addon'>
        <span class='glyphicon glyphicon-lock'></span>
    </span>
    <input type='password' name='password2' id='password2' placeholder='Re-enter Password' class='form-control'>
</div>
<input type='submit' name='resetPassword' class='btn btn-success btn-lg' value='Reset Password'>
"       
                ?>
        </div>
    </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
   $("#passwordreset").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "storeresetpassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $("#resultmessage").html(data);
        },
        error: function(){
                $("#resultmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
    
});
        
    </script>
    
</body>
</html>