    
    function goBack() {
         "use strict";
        var pathArray = window.location.pathname.split( '/' );
        
        if(pathArray[2]){
            var newURL = window.location.protocol + "//" + window.location.host + "/" + pathArray[1];
            window.location = newURL;
        }else{
            var newURL = window.location.protocol + "//" + window.location.host + "/" + pathArray[1];
            window.location = newURL;
        }
    }

    //Comment form submit by ajax start
     "use strict";
    $("#CommentForm").on('submit',function(event){ 

        event.preventDefault(); 
        var formdata = new FormData($(this)[0]);

        $.ajax({

            url: $(this).attr("action"),
            type: $(this).attr("method"),

            data: formdata, 
            processData: false,
            contentType: false,
            success: function (msg){

                if (msg==1) {
                    toastr.success('Success! - Your comment will appear after it is approved!');
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                    $("#commentField").val(" ");
                }else if (msg == 3) {
                    $("#loginModal").modal('show');
                    $(".loginMessage").html('<span class="alert text-danger text-center">Plz,login first.</span>');
                }else if (msg == 4){
                    toastr.error('Error! - Comment field is required!');
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    },2000);
                }
            },
            error: function (xhr, desc, err){
                 alert('failed');
            }
        });        
    });
    //Comment form submit by ajax end



    //Re Comments submit start
     "use strict";
    $('body').on('submit','.reComments',function(e){

        e.preventDefault(); 
        var formdata = $(this).serialize();;
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formdata, 
            dataType:'json',
            success: function (data){    
                if (data.message == 1) {
                    $(".replayCommentBox").hide();
                     toastr.success('Success! Your comment will appear after it is approved!')
                   
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }else if(data.message == 4){
                    toastr.error('Error! Comment field are required.')
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }
            },
            error: function (exc){
                 alert('failed');
            }
        });        
    });



    //Re Comments submit start
     "use strict";
     $('body').on('submit','.reComments1',function(e){
        e.preventDefault(); 
        var formdata = $(this).serialize();;
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formdata, 
            dataType:'json',
            success: function (data){
               if (data.message == 1) {
                    $(".replayCommentBox").hide();
                     toastr.success('Success! Your comment will appear after it is approved!')
                   
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }else if(data.message == 4){
                    toastr.error('Error! Comment field are required.')
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }
            },
            error: function (exc){
                 alert('failed');
            }
        });        
    });
    



    //Replay comment box show
     "use strict";
    $('body').on('click','.replayComment',function() {
        var replay = $(this).parent().next().next();
        replay.toggleClass('hide');
        $(".replayCommentBox").not(replay).addClass('hide'); 
    });

    "use strict";
    $('body').on('click','.replayComment1',function() {
        var replay = $(this).parent().next().next();
        replay.toggleClass('hide');
        $(".replayCommentBox").not(replay).addClass('hide'); 
    });