<?php

//start session
session_start();
include("connection.php");

//define errors
$missingBookname = "<p>Please enter Book Name!</p>";
$missingAuthorname = "<p>Please enter Author Name!</p>";
$missingCategory = "<p>Please enter Category of Book!</p>";
$missingBookID = "<p>Please enter Book ID!</p>";
$errors = "";

if(empty($_POST["deletebook"])){
    $errors .= $missingBookname;
}
else{
    $bookname = filter_var($_POST["deletebook"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["deleteauthor"])){
    $errors .= $missingAuthorname;
}
else{
    $authorname = filter_var($_POST["deleteauthor"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["category"])){
    $errors .= $missingCategory;
}
else{
    $category = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
    strtolower($category);
}
if(empty($_POST["deleteid"])){
    $errors .= $missingAuthorname;
}
else{
    $book_id = filter_var($_POST["deleteid"], FILTER_SANITIZE_STRING);
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
$book_id = mysqli_real_escape_string($link, $book_id);
$category = mysqli_real_escape_string($link, $category);
$newbook_id = substr($book_id, 1);

//run query for physics
if($category == "physics"){
    $sql = "SELECT * FROM physics WHERE phy_id = '$newbook_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo "<div class='alert alert-danger'>This Book is not present in Database!</div>";
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $availablebooks = $row["availablebook"];
    $totalbooks = $row["totalbooks"];
    if($availablebooks != $totalbooks){
        echo "<div class='alert alert-danger'>It can't be removed as all books are not present in library!</div>";
        exit;
    }
    
    $sql = "DELETE FROM physics WHERE phy_id = '$newbook_id' AND bookname = '$bookname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Successfully removed from Database!</div>";
    }
    $sql = "DELETE FROM booklist WHERE book_id = '$book_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    
}

//run query for novel
if($category == "novel"){
    $sql = "SELECT * FROM novel WHERE novel_id = '$newbook_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo "<div class='alert alert-danger'>This Book is not present in Database!</div>";
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $availablebooks = $row["availablebook"];
    $totalbooks = $row["totalbooks"];
    if($availablebooks != $totalbooks){
        echo "<div class='alert alert-danger'>It can't be removed as all books are not present in library!</div>";
        exit;
    }
    
    $sql = "DELETE FROM novel WHERE novel_id = '$newbook_id' AND bookname = '$bookname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Successfully removed from Database!</div>";
    }
    $sql = "DELETE FROM booklist WHERE book_id = '$book_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    
}

//run query for chemistry
if($category == "chemistry"){
    $sql = "SELECT * FROM chemistry WHERE chem_id = '$newbook_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo "<div class='alert alert-danger'>This Book is not present in Database!</div>";
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $availablebooks = $row["availablebook"];
    $totalbooks = $row["totalbooks"];
    if($availablebooks != $totalbooks){
        echo "<div class='alert alert-danger'>It can't be removed as all books are not present in library!</div>";
        exit;
    }
    
    $sql = "DELETE FROM chemistry WHERE chem_id = '$newbook_id' AND bookname = '$bookname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Successfully removed from Database!</div>";
    }
    $sql = "DELETE FROM booklist WHERE book_id = '$book_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    
}

//run query for maths
if($category == "maths"){
    $sql = "SELECT * FROM maths WHERE maths_id = '$newbook_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo "<div class='alert alert-danger'>This Book is not present in Database!</div>";
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $availablebooks = $row["availablebook"];
    $totalbooks = $row["totalbooks"];
    if($availablebooks != $totalbooks){
        echo "<div class='alert alert-danger'>It can't be removed as all books are not present in library!</div>";
        exit;
    }
    
    $sql = "DELETE FROM maths WHERE maths_id = '$newbook_id' AND bookname = '$bookname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Successfully removed from Database!</div>";
    }
    $sql = "DELETE FROM booklist WHERE book_id = '$book_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    
}

//run query for biology
if($category == "biology"){
    $sql = "SELECT * FROM biology WHERE bio_id = '$newbook_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo "<div class='alert alert-danger'>This Book is not present in Database!</div>";
        exit;
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $availablebooks = $row["availablebook"];
    $totalbooks = $row["totalbooks"];
    if($availablebooks != $totalbooks){
        echo "<div class='alert alert-danger'>It can't be removed as all books are not present in library!</div>";
        exit;
    }
    
    $sql = "DELETE FROM biology WHERE bio_id = '$newbook_id' AND bookname = '$bookname'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    else{
        echo "<div class='alert alert-success'>Book Successfully removed from Database!</div>";
    }
    $sql = "DELETE FROM booklist WHERE book_id = '$book_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>Error in running query</div>";
        exit;
    }
    
}


?>