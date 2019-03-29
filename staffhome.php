<?php
//start session
session_start();
if(!isset($_SESSION["staff_id"])){
    header("location: index.php");
}

include("connection.php");
$staff_id = $_SESSION["staff_id"];

//run query
$sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}

$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $username = $row["username"];
}

//run query to count total books in library
$sum = 0;
$available_sum = 0;

$sql = "SELECT * FROM physics";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}
if($result){
    if(@mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $sum = $sum + $row["totalbooks"];
            $available_sum = $available_sum + $row["availablebook"];
        }
    }
}

$sql = "SELECT * FROM novel";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}
if($result){
    if(@mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $sum = $sum + $row["totalbooks"];
            $available_sum = $available_sum + $row["availablebook"];
        }
    }
}

$sql = "SELECT * FROM chemistry";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}
if($result){
    if(@mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $sum = $sum + $row["totalbooks"];
            $available_sum = $available_sum + $row["availablebook"];
        }
    }
}

$sql = "SELECT * FROM biology";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}
if($result){
    if(@mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $sum = $sum + $row["totalbooks"];
            $available_sum = $available_sum + $row["availablebook"];
        }
    }
}

$sql = "SELECT * FROM maths";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}
if($result){
    if(@mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $sum = $sum + $row["totalbooks"];
            $available_sum = $available_sum + $row["availablebook"];
        }
    }
}

$issued_book = $sum - $available_sum;

?>


<!DOCTYPE html>

<html>
<head lang="en">
    <title>Library Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/flick/jquery-ui.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">

</head>
    
<body>
    
    <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" style="font-weight: bold; color: #00ffbf">
            Library Management
              <span class="glyphicon glyphicon-education"></span>
          </a>
          <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
      </div>
      <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="#">
              Home <span class="glyphicon glyphicon-home"></span>
            </a>
          </li>
          <li>
            <a href="#" data-target="#studentdetail" data-toggle="modal">
            Student Details
            </a>
          </li>
          <li>
            <a href="#" data-target="#bookdetails" data-toggle="modal">
            Books Details
            </a>
          </li>
            <li>
            <a href="#about_us">
              About Us
            </a>
          </li>
        </ul>
          
        <!--Search Box-->
         
        <form class="navbar-form navbar-left" role="search" id="searchform" action="search.php" method="get">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info">
                Go
              </button>
            </span>
            <label for="search" class="sr-only">
              Search
            </label>
            <input type="text" id="search" class="form-control" placeholder="Search" name="search">
            <span class="glyphicon glyphicon-search form-control-feedback">
            </span>
          </div>
        </form>

        
        <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logged as <b><?php echo $username; ?></b></a></li>
                 <li><a href="index.php?logout=1">Log out</a></li>

        </ul>
      </div>
  </div>
  </nav>
    
    <!--Library Profile-->
    <div class="container" id="container">
        <div class="row profile" >
            <div class="col-md-offset-3 col-md-6">
                <h2 style="padding-bottom:20px">Libranian Profile:</h2>
                
                <div class="table-reponsive" style="padding-bottom:10px;">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr>
                            <td>Staff Name</td>
                            <td>
                            <?php echo $username; ?>
                            </td>
                        </tr>
                        <tr data-target="#updatepassword" data-toggle="modal">
                            <td>Password</td>
                            <td>***************</td>
                        </tr>
                        <tr>
                            <td>Total Books in Library</td>
                            <td>Total Books:
                            <strong><?php echo $sum; ?></strong>
                            </td>
                        </tr>
                        <tr data-target="#issuedbook" data-toggle="modal">
                            <td>Total Issued Book</td>
                            <td>Issued Books:
                            <strong><?php echo $issued_book; ?></strong></td>
                        </tr>
                    </table>
                </div>
                
                <div>
                    <button class="btn btn-primary btn-lg" type="button" data-target="#addnew" data-toggle="modal" style="padding:10px; margin-left:10px;">
                    Add New Book
                    </button>
                    <button class="btn btn-danger btn-lg" type="button" data-target="#removebook" data-toggle="modal" style="padding:10px; margin-left:10px;">
                    Remove Book
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Update Password-->
    
    <form method="post" id="updatepasswordform">
      <div class="modal fade" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Enter Current and New Password:
              </h4>
          </div>
          <div class="modal-body">
              
            <!--update password message-->
              <div id = "updatepasswordmessage"></div>
              
            <div class="form-group input-group">
                <label for="currentpassword" class="sr-only">Your Current Password:</label>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input class="form-control" type="password" name="currentpassword" id="password" maxlength="30" placeholder="Your Current Password">
            </div>
              <div class="form-group input-group">
                <label for="password" class="sr-only">Choose a Password:</label>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                    </span>
                <input class="form-control" type="password" name="password" id="password" maxlength="30" placeholder="Choose a Password">
            </div>
              <div class="form-group input-group">
                <label for="password2" class="sr-only">Confirm Password:</label>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                 </span>
                <input class="form-control" type="password" name="password2" id="password2" maxlength="30" placeholder="Confirm Password">
            </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="submit" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    <!--Issued Book Details-->
    
      <div class="modal fade" id="issuedbook" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                List of Issued book Details :
              </h4>
          </div>
          <div class="modal-body">
              
        <!--Issued Book details message-->
        <div id = "issuedbookmessage"></div>
        
        <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>S. No.</th>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Category</th>
                                <th>Issued To:</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            //query for list of books issued
                            $sql = "SELECT * FROM record ORDER BY bookname ASC";
                            $result = mysqli_query($link, $sql);
                            if(!$result){
                                echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
                                exit;
                            }
                            
                            if($result){
    
                                if(@mysqli_num_rows($result) > 0){
                                    $sno = 0;
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
                                    //storing variable
                                    $book_id = $row["book_id"];
                                    $bookname = $row["bookname"];
                                    $authorname = $row["authorname"];
                                    $studentid = $row["user_id"];
                                    $sno = $sno + 1;
                                    
                                    $cat = substr($book_id,0,1);
                                    if($cat == "p"){
                                        $category = "Physics";
                                    }
                                    elseif($cat == "m"){
                                        $category = "Maths";
                                    }
                                    elseif($cat == "c"){
                                        $category = "Chemistry";
                                    }
                                    elseif($cat == "b"){
                                        $category = "Biology";
                                    }
                                    elseif($cat == "n"){
                                        $category = "Novel";
                                    }
                                    else{
                                        echo "<div class='alert alert-warning'>No Category Exists for this!</div>";
                                        exit;
                                    }
                                    
                                    $user_sql = "SELECT * FROM users WHERE user_id = '$studentid'";
                                    $user_result = mysqli_query($link, $user_sql);
                                    if(!$user_result){
                                        echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
                                        exit;
                                    }
                                    $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);
                                    $studentname = $user_row["username"];
        
                                    echo "
                                        <tr style='text-align: center'>
                                        <td>$sno</td>
                                        <td>$book_id</td>
                                        <td>$bookname</td>
                                        <td>$authorname</td>
                                        <td>$category</td>
                                        <td>$studentname (User ID: $studentid)</td>
                                        </tr>";
                                }
                                }
                                else{
                                    echo "<div class='alert alert-warning'><strong>No Books has been issued yet!</strong></div>";
                                }
                            }
                            else{
                                echo "<div class='alert alert-warning><strong>An Error occured.></strong></div>";
                                exit;
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>
                </div>
        
              
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    
    <!--Student Details-->
    
      <div class="modal fade" id="studentdetail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                List of Student and Details :
              </h4>
          </div>
          <div class="modal-body">
              
        <!--Student details message-->
        <div id = "studentmessage"></div>
        
        <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>S. No.</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Contact No.</th>
                                <th>Email Address</th>
                                <th>Total Books issued</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            //query for list of student
                            $sql = "SELECT * FROM users ORDER BY username ASC";
                            $result = mysqli_query($link, $sql);
                            if(!$result){
                                echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
                                exit;
                            }
                            
                            if($result){
    
                                if(@mysqli_num_rows($result) > 0){
                                    $sno = 0;
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
                                    //storing variable
                                    $studentname = $row["username"];
                                    $mobile = $row["mobile"];
                                    $total = $row["issued_book"];
                                    $email = $row["email"];
                                    $studentid = $row["user_id"];
                                    $sno = $sno + 1;
        
                                    echo "
                                        <tr style='text-align: center'>
                                        <td>$sno</td>
                                        <td>$studentid</td>
                                        <td>$studentname</td>
                                        <td>(+91)$mobile</td>
                                        <td>$email</td>
                                        <td>$total</td>
                                        </tr>";
                                }
                                }
                                else{
                                    echo "<div class='alert alert-warning'><strong>No Student has registered yet!</strong></div>";
                                    exit;
                                }
                            }
                            else{
                                echo "<div class='alert alert-warning><strong>An Error occured.></strong></div>";
                                exit;
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>
                </div>
        
              
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    
    
    <!--Add New Book-->
    <form method="post" id="addnewform">
      <div class="modal fade" id="addnew" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Add New Book:
              </h4>
          </div>
          <div class="modal-body">
              
              <!--Add Book message-->
              <div id="addbookmessage"></div>
              
            <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>Books Name</th>
                                <th>Author Name</th>
                                <th>Category</th>
                                <th>Total No. of Books</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><input type="text" class="form-control" placeholder="Enter Book Name" name="addbook"></th>
                                <th><input type="text" class="form-control" placeholder="Enter Author Name" name="addauthor"></th>
                                <th><input type="text" class="form-control" placeholder="Category" name="category"></th>
                                <th><input type="number" class="form-control" placeholder="Enter Number of Books" name="addnum"></th>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="submit" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    
    <!--Remove Book-->
    <form method="post" id="removebookform">
      <div class="modal fade" id="removebook" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Remove Book:
              </h4>
          </div>
          <div class="modal-body">
              
              <!--Remove Book message-->
              <div id="removebookmessage"></div>
              
            <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>Books Name</th>
                                <th>Author Name</th>
                                <th>Category</th>
                                <th>Book ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><input type="text" class="form-control" placeholder="Enter Book Name" name="deletebook"></th>
                                <th><input type="text" class="form-control" placeholder="Enter Author Name" name="deleteauthor"></th>
                                <th><input type="text" class="form-control" placeholder="Category" name="category"></th>
                                <th><input type="text" class="form-control" placeholder="Book ID" name="deleteid"></th>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="submit" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>
    
    <!--Book Details-->
    <?php
    
    include("bookdetails.php");
    
    ?>
    
    <!--About us-->
    
    <div class="container-fluid">
        <div class="row">
            <div class="about_us col-sm-4" id="about_us">
                <img src="images/about.png" alt="About Us" class="about_img">
                <p>A library is a collection of books. But it is not a book-shop, for it does not sell books. It is a temple of learning. In the past, people had to go to a teacher to learn from him. But how easy and cheap it is to get knowledge and wisdom today!</p>
                <p>It Provides Millions of books just by signing in which help in building career and personality.</p>
            </div>
            <div class="col-sm-4">
                <img src="images/address.png" alt="About Us" class="about_img">
                <p><span style="font-weight: bold; color:black; text-decoration: underline; font-size: 1.4em">Address:</span><br>Sector 62, Noida,<br>Uttar Pradesh, India
                </p>
                <p><span style="font-weight: bold; color:black; text-decoration: underline; font-size: 1.4em">Contact:</span><br><div style="text-align: justify; padding-left: 90px">
                        <span style="color: black; text-decoration: underline; font-weight: bold">Phone:</span> (+91)8808524172<br><span style="color: black; text-decoration: underline; font-weight: bold">WhatsApp:</span> (+91)8808524172<br><span style="color: black; text-decoration: underline; font-weight: bold">Fax:</span> (+91)8808524173<br><span style="color: black; text-decoration: underline; font-weight: bold">Email:</span> expert.saurabh178@gmail.com
                    </div>
                </p>
                
            </div>
            <div class="col-sm-4">
                <img src="images/connect.png" alt="About Us" class="about_img">
                <form class="form-inline" method="post">
                    <h3 style="font-weight: bold; color:black; text-decoration: underline; font-size: 1.4em">Subscribe:</h3>
                    <p>Get monthly updates and free resources.</p><br>
                    <label for="subscribe_email" class="sr-only">Subscription Email</label>
                    <input type="email" class="form-control input-sm input-inverse" name="subscribe_email" id="subscribe_email" required placeholder="Email">
                    <button href="" class="btn btn-primary display-4" type="submit" role="button">Subscribe</button>
                </form>
                <div>
                    <h3 style="font-weight: bold; color:black; text-decoration: underline; font-size: 1.4em">Connect with us:</h3>
                    <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="facebook"></a>
                    <a href="https://plus.google.com/"><img src="images/google+.png" alt="google"></a>
                    <a href="https://twitter.com/"><img src="images/twitter.png" alt="twitter"></a>
                    <a href="https://www.instagram.com/"><img src="images/instagram.png" alt="instagram"></a>
                    <a href="https://www.youtube.com/"><img src="images/youtube.png" alt="youtube"></a>
                </div>
            
        </div>
    
    </div>
    </div>
    
    <!-- Footer-->
      <div class="footer">
          <div class="container-fluid">
              <p>LibraryManagement.com Copyright &copy; 2017-
                  <?php $today = date("Y");
                   echo $today;
                   ?>.
              </p>
          </div>
      </div>
    
    
    <script>
        
    </script>
    
    <script src="staffhome.js"></script>
    <script src="addremove.js"></script>
    
</body>
</html>