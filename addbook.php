<?php

//start session
session_start();
include("connection.php");

//define errors
$missingBookname = "<p>Please enter Book Name!</p>";
$missingAuthorname = "<p>Please enter Author Name!</p>";
$missingTotalbook = "<p>Please enter Total Number of Books!</p>";
$missingCategory = "<p>Please enter Category of Book!</p>";
$Negative = "<p>Total Books can't be Negative!</p>";
$errors = "";

if(empty($_POST["addbook"])){
    $errors .= $missingBookname;
}
else{
    $bookname = filter_var($_POST["addbook"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["addauthor"])){
    $errors .= $missingAuthorname;
}
else{
    $authorname = filter_var($_POST["addauthor"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["category"])){
    $errors .= $missingCategory;
}
else{
    $category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
    strtolower($category);
}
if(empty($_POST["addnum"])){
    $errors .= $missingTotalbook;
}
else{
    $total = $_POST["addnum"];
    if($total <= 0){
        $errors .= $Negative;
    }
}

//print errors
if($errors){
    $resultMessage = '<div class="alert alert-danger"><strong>' . $errors . '</strong></div>';
    echo $resultMessage;
    exit;
}

//variables for query and checking existence of record
$bookname = mysqli_real_escape_string($link, $bookname);
$authorname = mysqli_real_escape_string($link, $authorname);
$total = mysqli_real_escape_string($link, $total);
$category = mysqli_real_escape_string($link, $category);

//run query for physics
if($category == "physics"||$category == "Physics"){
    
    $sql = "SELECT * FROM physics WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<div class='alert alert-danger'>This Book is already present in Database!</div>";
        exit;
    }
    
    $sql = "INSERT INTO physics (bookname, authorname, totalbooks, availablebook) VALUES ('$bookname', '$authorname', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Added successfully to DataBase!</div>";
    }
    
    //get book_id
    $sql = "SELECT * FROM physics WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $phy_id = $row["phy_id"];
    $book_id = "p$phy_id";
    
    //store in booklist
    $sql = "INSERT INTO booklist (book_id, bookname, authorname, category, totalbooks, availablebooks) VALUES ('$book_id', '$bookname', '$authorname', '$category', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
}

//run query for novel
if($category == "novel"||$category == "Novel"){
    
    $sql = "SELECT * FROM novel WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<div class='alert alert-danger'>This Book is already present in Database!</div>";
        exit;
    }
    
    $sql = "INSERT INTO novel (bookname, authorname, totalbooks, availablebook) VALUES ('$bookname', '$authorname', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Added successfully to DataBase!</div>";
    }
    
    //get book_id
    $sql = "SELECT * FROM novel WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $novel_id = $row["novel_id"];
    $book_id = "n$novel_id";
    
    //store in booklist
    $sql = "INSERT INTO booklist (book_id, bookname, authorname, category, totalbooks, availablebooks) VALUES ('$book_id', '$bookname', '$authorname', '$category', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
}

//run query for chemistry
if($category == "chemistry"||$category == "Chemistry"){
    
    $sql = "SELECT * FROM chemistry WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<div class='alert alert-danger'>This Book is already present in Database!</div>";
        exit;
    }
    
    $sql = "INSERT INTO chemistry (bookname, authorname, totalbooks, availablebook) VALUES ('$bookname', '$authorname', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Added successfully to DataBase!</div>";
    }
    
    //get book_id
    $sql = "SELECT * FROM chemistry WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $chem_id = $row["chem_id"];
    $book_id = "c$chem_id";
    
    //store in booklist
    $sql = "INSERT INTO booklist (book_id, bookname, authorname, category, totalbooks, availablebooks) VALUES ('$book_id', '$bookname', '$authorname', '$category', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
}

//run query for biology
if($category == "biology"||$category == "Biology"){
    
    $sql = "SELECT * FROM biology WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<div class='alert alert-danger'>This Book is already present in Database!</div>";
        exit;
    }
    
    $sql = "INSERT INTO biology (bookname, authorname, totalbooks, availablebook) VALUES ('$bookname', '$authorname', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Added successfully to DataBase!</div>";
    }
    
    //get book_id
    $sql = "SELECT * FROM biology WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $bio_id = $row["bio_id"];
    $book_id = "b$bio_id";
    
    //store in booklist
    $sql = "INSERT INTO booklist (book_id, bookname, authorname, category, totalbooks, availablebooks) VALUES ('$book_id', '$bookname', '$authorname', '$category', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
}

//run query for maths
if($category == "maths"||$category == "Maths"){
    
    $sql = "SELECT * FROM maths WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<div class='alert alert-danger'>This Book is already present in Database!</div>";
        exit;
    }
    
    $sql = "INSERT INTO maths (bookname, authorname, totalbooks, availablebook) VALUES ('$bookname', '$authorname', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Added successfully to DataBase!</div>";
    }
    
    //get book_id
    $sql = "SELECT * FROM maths WHERE bookname = '$bookname' AND authorname = '$authorname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $maths_id = $row["maths_id"];
    $book_id = "m$maths_id";
    
    //store in booklist
    $sql = "INSERT INTO booklist (book_id, bookname, authorname, category, totalbooks, availablebooks) VALUES ('$book_id', '$bookname', '$authorname', '$category', '$total', '$total')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
}



?>
