<?php

//start a session
session_start();
include("connection.php");

//define errors
$missingEmail = "<p><strong>Please enter email!</strong></p>";
$missingPassword = "<p><strong>Please enter your password to login!</strong></p>";
$errors = '';

//get email and password
if(empty($_POST["loginemail"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
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
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256', $password);

$sql = "SELECT * FROM users WHERE (email = '$email' AND password = '$password' AND activation = 'activated')";
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
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["username"] = $row["username"];
    $_SESSION["email"] = $row["email"];
    
    if(empty($_POST["rememberme"])){
        echo "success";
    }
    else{
        
        //store authentificator in cookies
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        $authentificator2 = openssl_random_pseudo_bytes(10);
        
        function f1($a, $b){
            $c = $a . "," . $b;
            return $c;
        }
        
        $cookievalue = f1($authentificator1, $authentificator2);
        setcookie("remember", $cookievalue, time() + 15*24*60*60);
        
        function f2($a){
            $b = hash('sha256', $a);
            return $b;
        }
        
        $f2authentificator2 = f2($authentificator2);
        $user_id = $_SESSION["user_id"];
        $expiration = date("Y-m-d-H:i:s", time() + 15*24*60*60);
        
        //run query
        $sql = "INSERT INTO rememberme (authentificator1,f2authentificator2,user_id,expires) VALUES ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "<div class='alert alert-danger'><strong>Error in remembering you!</strong></div>";
        }
        else{
            echo "success";
        }
    }
}


?>