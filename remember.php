<?php

//user is not logged in
if(!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])){
    
    //f1: COOKIE: $a . "," . bin2hex($b)
    //f2:hash('sha256',$a)
    //extract $authentificator 1&2
    list($authentificator1, $authentificator2) = explode(',',$_COOKIE['rememberme']);
    $authentificator2 = hex2bin($authentificator2);
    $f2authentificator2 = hash('sha256', $authentificator2);
    
    //check for authentificator1 in table
    $sql = "SELECT * FROM rememberme WHERE authentificator1 = '$authentificator1'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'><strong>Error in running query</strong></div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo "<div class='alert alert-danger'><strong>Remember process failed!</strong></div>";
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    //if authentificator2 does not match
    if(!hash_equals($row['f2authentificator2'], $f2authentificator2)){
        echo "<div class='alert alert-danger'><strong>Remember me process failed as hash didn't match</strong></div>";
    }
    else{
        //generate new authentificator & store in cookies and table
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        $authentificator2 = openssl_random_pseudo_bytes(10);
        
        function f1($a, $b){
            $c = $a . "," . bin2hex($b);
            return $c;
        
        }
        $cookievalue = f1($authentificator1, $authentificator2);
        setcookie("rememberme",$cookievalue,time() + 15*24*60*60);
        
        function f2($a){
            $b = hash('sha256', $a);
            return $b;
        }
        $f2authentificator2 = f2($authentificator2);
        $user_id = $_SESSION['user_id'];
        $expiration = date('Y-m-d H:i:s',time() + 15*24*60*60);
        
        $sql = "INSERT INTO rememberme (authentificator1,f2authentificator2,user_id,expires) VALUES ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "<div class='alert alert-danger'><strong>Error in remembering you!</strong></div>";
        }
        
        $_SESSION['user_id'] = $row['user_id'];
        header("location:home.php");
        
    }
}


?>