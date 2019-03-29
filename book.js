
//ajax call for physics
$("#phyCheckInOut").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatephysics.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#physicsmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#physicsmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//ajax call for novel
$("#novelCheckInOut").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatenovel.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#novelmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#novelmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//ajax call for chemistry
$("#chemCheckInOut").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatechemistry.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#chemmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#chemmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//ajax call for maths
$("#mathsCheckInOut").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatemaths.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#mathsmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#mathsmessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});

//ajax call for biology
$("#bioCheckInOut").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "updatebiology.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#biomessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
             $("#biomessage").html("<div class='alert alert-danger'>There was error, Please try again later.</div>");
        }
    });
});