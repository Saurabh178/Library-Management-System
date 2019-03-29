
//Ajax call for signup Form
$("#signupform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'><strong>There was an error, Please try again later!</strong><div>");
        }
    });
});

//Ajax call for student login Form
$("#loginform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "home.php";
            }
            else{ 
                $("#loginmessage").html(data);
            }
        },
        error: function(){
                $("#loginmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
    
});

//Ajax call for Forgot Password
$("#forgotpasswordform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $("#forgotpasswordmessage").html(data);
        },
        error: function(){
                $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
    
});

//Ajax call for staff login Form
$("#staffloginform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "stafflogin.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "staffhome.php";
            }
            else{ 
                $("#staffloginmessage").html(data);
            }
        },
        error: function(){
                $("#staffloginmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
    
});

//Ajax call for contact us Form
$("#contactform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "contact.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#contactmessage").html(data);
            }
        },
        error: function(){
            $("#contactmessage").html("<div class='alert alert-danger'><strong>There was an error, Please try again later!</strong><div>");
        }
    });
});
