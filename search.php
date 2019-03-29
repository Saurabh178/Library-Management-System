<?php

//start session
session_start();
include("connection.php");

//get value
$search = $_GET["search"];
$min_len = 3;

if($min_len <= strlen($search)){
    $search = mysqli_real_escape_string($link, $search);
    $sql = "SELECT * FROM physics WHERE (`bookname` LIKE '%".$search."%') OR (`authorname` LIKE '%".$search."%')";
    $results = mysqli_query($link, $sql);
    if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
    }
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
            echo "<p><h3>".$row['bookname']."</h3>".$row['authorname']."</p>";
        }
    }
    else{
        echo "<div class='alert alert-warning'>No Matching book found!</div?";
    }
}
else{
    echo "<div class='alert alert-warning'>Enter more details to search!";
}


?>