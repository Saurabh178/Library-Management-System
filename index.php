<?php
//start session
session_start();

include('connection.php');

include('create_table.php');

//logout
include('logout.php');

//call rememberme
include('remember.php');

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
          <li >
            <a href="#">
              Home <span class="glyphicon glyphicon-home"></span>
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
            <li>
            <a href="#" data-target="#contactModal" data-toggle="modal">
              Contact Us <span class="glyphicon glyphicon-earphone"></span>
            </a>
          </li>
        </ul>
        
        <form class="navbar-form navbar-right">
            <li class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                Login
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu effect">
                    <li><a href="#" data-target="#loginModal" data-toggle="modal">Student Login</a></li>
                    <li><a href="#" data-target="#staffloginModal" data-toggle="modal">Staff Login</a></li>
                
                </ul>
            </li>
        </form>
      </div>
  </div>
  </nav>
    
    <div class="jumbotron container">
        <div class="container-fluid">
                <h1 id="top">Welcome to Library Management System</h1>
                <p>Feel free to get any information needed.</p>
                <p>And Explore the World!</p>
                <button type="button" class="btn btn-lg green signup" data-target="#signupModal" data-toggle="modal">Sign up-It's free</button>
        </div>
    </div>
    <div class="container-fluid">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="carousel slide" id="myCarousel" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active">
          </li>
          <li data-target="#myCarousel" data-slide-to="1">
          </li>
          <li data-target="#myCarousel" data-slide-to="2">
          </li>
            <li data-target="#myCarousel" data-slide-to="3">
          </li>
            <li data-target="#myCarousel" data-slide-to="4">
          </li>
            <li data-target="#myCarousel" data-slide-to="5">
          </li>
            <li data-target="#myCarousel" data-slide-to="6">
          </li>
        </ol>
        <div class="carousel-inner" id="manage">
      <div class="item">
        <img src="images/img3.jpg">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="images/img4.jpg">
        <div class="carousel-caption">
        </div>
      </div>
    <div class="item">
        <img src="images/img5.jpg">
        <div class="carousel-caption">
        </div>
      </div>
    <div class="item active">
        <img src="images/img2.jpg">
        <div class="carousel-caption">
        </div>
      </div>
    <div class="item">
        <img src="images/img7.jpg">
        <div class="carousel-caption">
        </div>
      </div>
    <div class="item">
        <img src="images/img8.jpg">
        <div class="carousel-caption">
        </div>
      </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left">
    </span>
    <span class="sr-only">
      Previous
    </span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right">
    </span>
    <span class="sr-only">
      Previous
    </span>
  </a>
  </div>
    
    </div>
    </div>
    
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
    
    <!--signup form-->
    
    <form method="post" id="signupform">
        <div class="modal fade" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Sign up today and Start using our Library Management System! 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group input-group">
                      <label for="username" class="sr-only">Username:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                      </span>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
                  </div>
                  <div class="form-group input-group">
                      <label for="email" class="sr-only">Email:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group input-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span>
                      </span>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group input-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span>
                      </span>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
                  <div class="form-group input-group">
                      <label for="mobile" class="sr-only">Mobile Number</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-phone"></span>
                      </span>
                      <input class="form-control" type="tel" name="mobile" id="mobile" placeholder="Mobile Number" maxlength="10">
                  </div>
                  <div class="form-group">
                      <label for="dob" class="sr-only">Date of Birth</label>
                      <input class="form-control" name="dob" id="dob" placeholder="Date of Birth">
                  </div>
                  <div class="form-group radio">
                    <div class="radio radio-inline">
                      <label for="gender">
                      <input type="radio" name="gender" id="male" value="Male" checked="checked">
                        Male</label>
                  </div>
                  <div class="radio radio-inline">
                      <label for="gender">
                      <input type="radio" name="gender" id="female" value="Female" >
                        Female</label>
                  </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="signup" type="submit" value="Sign up">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>
    
    <!--student login form-->
    
    <form method="post" id="loginform">
        <div class="modal fade" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Student Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="input-group form-group">
                      <label for="loginemail" class="sr-only">Email</label>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-envelope"></span>
                        </span>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="input-group form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-lock"></span>
                        </span>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                          <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
    
    <!--staff login form-->
    
    <form method="post" id="staffloginform">
        <div class="modal fade" id="staffloginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Staff Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Staff Login message from PHP file-->
                  <div id="staffloginmessage"></div>
                  

                  <div class="input-group form-group">
                      <label for="username" class="sr-only">Email</label>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-user"></span>
                        </span>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="50">
                  </div>
                  <div class="input-group form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-lock"></span>
                        </span>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
    
    <!--Forgot password form-->
    
      <form method="post" id="forgotpasswordform">
        <div class="modal fade" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  
                  <div class="form-group input-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                      </span>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
    
        <!--Book Details-->
        <?php
    
        include("bookdetails.php");
    
        ?>
    
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
        $(function(){
        $("#dob").datepicker({
            showAnim: "fadeIn",
            changeYear: true,
            changeMonth: true,
            dateFormat: "dd/mm/yy",
            yearRange: "-60:-10"
        })
        });
    </script>
    
    <script src="index.js"></script>
    
</body>
</html>