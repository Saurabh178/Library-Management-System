<?php

//start session
session_start();
include("connection.php");
$user_id = $_SESSION["user_id"];

//run query to get number of books
$sql = "SELECT * FROM chemistry ORDER BY bookname ASC";
$result = mysqli_query($link, $sql);
if(!$result){
echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
exit;
}

if(mysqli_num_rows($result) > 0){
    $divId = -1;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $divId = $divId + 1;
    if(empty($_POST["chemcheck$divId"])){
        continue;
    }
        
    //get physics book id
    $chem_id = $row["chem_id"];
    $rchem_id = "c$chem_id";
    $decision = $_POST["chemcheck$divId"];
    $available = $row["availablebook"];
    $bookname = $row["bookname"];
    $authorname = $row["authorname"];
    $total = $row["totalbooks"];
        
    //run query to get issued book from users table    
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $uresult = mysqli_query($link, $sql);
    if(!$uresult){
        echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
        exit;
    }
    $userrow = mysqli_fetch_array($uresult, MYSQLI_ASSOC);
    $issuedbook = $userrow["issued_book"];
        
    if($decision == "Issue"){
        if($available <= 0){
            echo "<div class='alert alert-danger'>".$bookname."</strong> is not available, Please Comeback later to issue this book!</div>";
            exit;
        }
        
        if($issuedbook >= 5){
            echo "<div class='alert alert-danger'>You have issued 5 books, Please return some book to issue another!<br>So you cannot issue <strong>".$bookname." </strong> right now!</div>";
            return null;
        }
        
        //run query to check whether particular book is issued or not
        $sql = "SELECT * FROM record WHERE book_id = '$rchem_id' AND user_id = '$user_id'";
        $tresults = mysqli_query($link, $sql);
        if(!$tresults){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        $count = mysqli_num_rows($tresults);
        if($count > 0){
            echo "<div class='alert alert-danger'><strong>".$bookname."</strong> is already issued.You can try another book!</div>";
            exit;
        }
        
        echo "<div class='alert alert-danger'>You have issued <strong>".$bookname."</strong> now!</div>";
        
        //run query for user
        $sql = "UPDATE users SET issued_book = issued_book + 1 WHERE user_id = '$user_id'";
        $results = mysqli_query($link, $sql);
        if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        
        //run query
        $sql = "UPDATE chemistry SET availablebook = availablebook - 1 WHERE chem_id = '$chem_id'";
        $results = mysqli_query($link, $sql);
        if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        
        $sql = "UPDATE booklist SET availablebooks = availablebooks - 1 WHERE book_id = '$rchem_id'";
        $results = mysqli_query($link, $sql);
        if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        
        //run query to insert user_id and book_id in table: record
        $sql = "INSERT INTO record (user_id, book_id, bookname, authorname) VALUES ('$user_id', '$rchem_id', '$bookname', '$authorname')";
        $tresults = mysqli_query($link, $sql);
        if(!$tresults){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
    
    }   
        
    if($decision == "Return"){
        if($available >= $total){
            echo "<div class='alert alert-danger'><strong>".$bookname."</strong> can't be returned as this book is not issued yet!</div>";
            exit;
        }
        
        if($issuedbook <= 0){
            echo "<div class='alert alert-danger'>You have not issued any book yet!</div>";
            return null;
        }
        
        //run query to check whether particular book is issued or not
        $sql = "SELECT * FROM record WHERE book_id = '$rchem_id' AND user_id = '$user_id'";
        $tresults = mysqli_query($link, $sql);
        if(!$tresults){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        $count = mysqli_num_rows($tresults);
        if($count == 0){
            echo "<div class='alert alert-danger'><strong>".$bookname."</strong> is not yet issued by you.You can issue this book!</div>";
            exit;
        }
        
        echo "<div class='alert alert-danger'>You have returned <strong>".$bookname."</strong> now!</div>";
        
        //run query for user
        $sql = "UPDATE users SET issued_book = issued_book - 1 WHERE user_id = '$user_id'";
        $results = mysqli_query($link, $sql);
        if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        
        //run query
        $sql = "UPDATE chemistry SET availablebook = availablebook + 1 WHERE chem_id = '$chem_id'";
        $results = mysqli_query($link, $sql);
        if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        
        $sql = "UPDATE booklist SET availablebooks = availablebooks + 1 WHERE book_id = '$rchem_id'";
        $results = mysqli_query($link, $sql);
        if(!$results){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
        
        //run query to delete user_id and book_id in table: record
        $sql = "DELETE FROM record WHERE book_id = '$rchem_id'";
        $tresults = mysqli_query($link, $sql);
        if(!$tresults){
            echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
            exit;
        }
    }   
    }
}
else{
    echo "<div class='alert alert-warning'><strong>No Book Currently Available, Please try again later.</strong></div>";
    exit;
}


?>