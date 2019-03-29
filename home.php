<?php
//start session
session_start();
if(!isset($_SESSION["user_id"])){
    header("location: index.php");
}

include("connection.php");
$user_id = $_SESSION["user_id"];

//run query
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
    exit;
}
$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $username = $row["username"];
    $email = $row["email"];
    $mobile = $row["mobile"];
    $dob = $row["dob"];
    $gender = $row["gender"];
    $picture = $row["profile_pic"];
    $issued_book = $row["issued_book"];
}

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
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Book Bank 
              <span class="caret">
              </span>
              </a>
                <ul class="dropdown-menu effect">
                <li><a href="#" data-target="#phy" data-toggle="modal">Physics</a></li>
                <li><a href="#" data-target="#chem" data-toggle="modal">Chemistry</a></li>
                <li><a href="#" data-target="#maths" data-toggle="modal">Maths</a></li>
                <li><a href="#" data-target="#bio" data-toggle="modal">Biology</a></li>
                <li><a href="#" data-target="#novel" data-toggle="modal">Novel</a></li>
            </ul>
          </li>
            <li>
            <a href="#about_us">
              About Us
            </a>
          </li>
            <li>
            <a href="#" data-target="#contactModal" data-toggle="modal">
              Contact Us <span class="glyphicon glyphicon-earphone"></span>
            </a>
          </li>
        </ul>
          
         
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
    
    <!--user Profile-->
    
    <div class="container" id="container">
        <div class="row profile" >
            <div class="col-md-offset-3 col-md-6">
                <h2>User Profile:</h2>
                <div >
                    <a href="#" data-target="#updatepic" data-toggle="modal">
                        <?php
                        
                        if(empty($picture)){
                            echo "<img src='profile/no_image.png' height='180' width='170' id='pic'>";
                        }
                        else{
                            echo "<img src='$picture' height='180' width='170' id='pic'>";
                        }
                        ?>
                    </a>
                </div>
                <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr data-target="#updateusername" data-toggle="modal">
                            <td>Username</td>
                            <td>
                            <?php echo $username; ?>
                            </td>
                        </tr>
                        <tr data-target="#updateemail" data-toggle="modal">
                            <td>Email</td>
                            <td>
                            <?php echo $email; ?>
                            </td>
                        </tr>
                        <tr data-target="#updatepassword" data-toggle="modal">
                            <td>Password</td>
                            <td>***************</td>
                        </tr>
                        <tr data-target="#updatemobile" data-toggle="modal">
                            <td>Mobile Number</td>
                            <td>(+91)
                            <?php echo $mobile; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>
                            <?php echo $dob; ?>
                            </td>
                        </tr>
                        <tr >
                            <td>Gender</td>
                            <td>
                            <?php echo $gender; ?>
                            </td>
                        </tr>
                        <tr data-target="#bookdetails" data-toggle="modal">
                            <td>Book Details</td>
                            <td>Issued Book:
                            <strong><?php echo $issued_book; ?></strong>
                            <br><a>Click to get more details!</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!--Update Username-->
    
    <form method="post" id="updateusernameform">
      <div class="modal fade" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Edit Username:
              </h4>
          </div>
          <div class="modal-body">
              
              <!--update username message-->
              <div class="updateusernamemessage"></div>
              
            <div class="form-group input-group">
                <label for="username" class="sr-only" >Username:</label>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input class="form-control" type="text" name="username" id="username" maxlength="30" value="<?php echo $username; ?>">
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
    
    <!--Update Email-->
    
    <form method="post" id="updateemailform">
      <div class="modal fade" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Enter new Email Address:
              </h4>
          </div>
          <div class="modal-body">
              
            <!--update email message-->
              <div id="updateemailmessage"></div>
              
            <div class="form-group input-group">
                <label for="email" class="sr-only">Email:</label>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                </span>
                <input class="form-control" type="email" name="email" id="email" maxlength="50" value="<?php echo $email; ?>">
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
    
    <!--Update number-->
    
    <form method="post" id="updatemobileform">
      <div class="modal fade" id="updatemobile" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Enter New Mobile Number:
              </h4>
          </div>
          <div class="modal-body">
              
            <!--update number message-->
              <div id = "updatemobilemessage"></div>
              
              <div class="form-group input-group">
                <label for="mobile" class="sr-only">New Mobile Number:</label>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-phone"></span>
                    </span>
                <input class="form-control" type="tel" name="mobile" id="mobile" maxlength="10" value="<?php echo $mobile; ?>">
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
    
    <!--Update Profile Picture-->
    
    <form method="post" id="updatepicform" enctype="multipart/form-data">
      <div class="modal fade" id="updatepic" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Upload new image to change your Profile Picture:
              </h4>
          </div>
          <div class="modal-body">
              
            <!--upload picture message-->
              <div id = "updatepicmessage"></div>
              
              <div>
                <?php
                  if(empty($picture)){
                    echo "<img id='preview' class='preview' src='profile/no_image.png'>";
                  }
                  else {
                      echo "<img id='preview' class='preview' src='$picture'>";
                  }
                  
                ?>
              </div>
              <br>
              <div class="form-group">
                <label for="image" class="sr-only">New Profile Image:</label>
                <input type="file" name="image" id="image">
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
    
    <!--contact us form-->
    
    <form method="post" id="contactform">
        <div class="modal fade" id="contactModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Any question in mind, Feel free to contact us! 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--contact us message from PHP file-->
                  <div id="contactmessage"></div>
                  
                  <div class="form-group input-group">
                      <label for="contactusername" class="sr-only">Email:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                      </span>
                      <input class="form-control" type="text" name="contactusername" id="contactusername" placeholder="Username" maxlength="50">
                  </div>
                  <div class="form-group input-group">
                      <label for="contactemail" class="sr-only">Email:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                      <input class="form-control" type="email" name="contactemail" id="contactemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group input-group">
                      <label for="contactnumber" class="sr-only">Email:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-phone"></span>
                      </span>
                      <input class="form-control" type="tel" name="contactnumber" id="contactnumber" placeholder="Mobile Number" maxlength="10">
                  </div>
                  <div class="form-group input-group">
                      <label for="contacttext" class="sr-only">Email:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-pencil"></span>
                      </span>
                      <textarea class="form-control" name="contacttext" placeholder="Enter your Message or Query!" rows="3"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="send" type="submit" id="send" value="Send"> 
              </div>
          </div>
      </div>
      </div>
      </form>
    
    <!--Books issued Details-->
    
      <div class="modal fade" id="bookdetails" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Issued Books Details:
              </h4>
          </div>
              
          <div class="modal-body">
             <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>Serial No.</th>
                                <th>Book Id</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            //query to display list of books issued by a student
                            $sql = "SELECT * FROM record WHERE user_id = '$user_id'";
                            $result = mysqli_query($link, $sql);
                            if(!$result){
                                echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
                                exit;
                            }
                            
                            if($result){
                                $s_no = 0;
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        
                                        //storing value in variable
                                        $book_id = $row["book_id"];
                                        $bookname = $row["bookname"];
                                        $authorname = $row["authorname"];
                                        $s_no = $s_no + 1;
                                        
                                        echo "
                                            <tr style='text-align: center'>
                                            <td>$s_no</td>
                                            <td>$book_id</td>
                                            <td>$bookname</td>
                                            <td>$authorname</td>
                                            </tr>";
                                    }
                                }
                                else{
                                        echo "<div class='alert alert-warning'><strong>No Book Issued yet!</strong></div>";
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
         </div> 
              
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
  </div>
  </div>
  </div>
    
    <!--Books section-->
    <?php
    
    include ("physics.php");
    include ("novel.php");
    include ("chemistry.php");
    include ("maths.php");
    include ("biology.php");
    
    ?>
    
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
    
    <script src="home.js"></script>
    <script src="book.js"></script>
    
</body>
</html>