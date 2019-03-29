
//ajax call to add book
$("#addnewform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "addbook.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#addbookmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#addbookmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//ajax call to remove book
$("#removebookform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "removebook.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#removebookmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#removebookmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});