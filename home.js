
//update picture
var file;
var imageType;
var imageSize;
var wrongType;

$("#image").change(function(){
    file = this.files[0];
    imageSize = file.size;
    imageType = file.type;
    
    //check image type
    var acceptableTypes = ["image/jpeg", "image/png", "image/jpg"];
    wrongType = ($.inArray(imageType, acceptableTypes) == -1);
    
    if(wrongType){
        $("#updatepicmessage").html("<div class='alert alert-danger'>Only jpeg, png, and jpg images are accepted!</div>");
        return false;
    }
    
    //check image size
    if(imageSize > 5*1024*1024){
        $("#updatepicmessage").html("<div class='alert alert-danger'>Please upload an image less than 5MB!</div>");
        return false;
    }
    
    //convert image to binary string using filereader
    var reader = new FileReader();
    //callback
    reader.onload = updatePreview;
    //convert content into data URL which is passed to callback
    reader.readAsDataURL(file);
    
    
});


function updatePreview(event){
    $("#preview").attr("src", event.target.result);
}


//ajax call for update picture
$("#updatepicform").submit(function(){
    event.preventDefault();
    
    //file not uploaded
    if(!file){
        $("#updatepicmessage").html("<div class='alert alert-danger'>Please upload picture!</div>");
        return false;
    }
    
    //file not uploaded
    if(wrongType){
        $("#updatepicmessage").html("<div class='alert alert-danger'>Only jpeg, png, and jpg images are accepted!</div>");
        return false;
    }
    
    //file is too big
    if(imageSize > 5*1024*1024){
        $("#updatepicmessage").html("<div class='alert alert-danger'>Please upload an image less than 5MB!</div>");
        return false;
    }
    
    $.ajax({
        url: "updatepic.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            if(data){
                $("#updatepicmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
            $("#updatepicmessage").html("<div class='alert alert-danger'>There was an error, Please try again later!</div>");
    }
        
    });
    
});

//ajax call for update username
$("#updateusernameform").submit(function(event){
   event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
       url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error, Please try again later!</div>");
        }
    });
});

//ajax call for updatepassword.php
$("#updatepasswordform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }
        },
        error: function(){
             $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});


//ajax call for updateemail.php
$("#updateemailform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
            }
        },
        error: function(){
             $("#updateemailmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//ajax call for updatemobile.php
$("#updatemobileform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatemobile.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatemobilemessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#updatemobilemessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
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
