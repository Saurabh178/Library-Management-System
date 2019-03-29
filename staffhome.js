//ajax call for updatepassword.php
$("#updatepasswordform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatestaffpassword.php",
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