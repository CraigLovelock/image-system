$("document").ready(function(){

    FastClick.attach(document.body);
    var url = window.location.href;
    if ( !$(".main-image").attr("src") && url.indexOf("find") > 0 ) {
        loadImageAjax();
    }

    // on page refesh button click, perform ajax call
    jQuery(document.body).on('click touchstart', '.load-new-image', function(e){
        e.preventDefault();
        loadImageAjax();
    });

    // upvote the image
    jQuery(document.body).on('click touchstart', '.vote-up-enabled', function(e){
        e.preventDefault();
        upvoteAjax();
    });

    // show the share modal
    jQuery(document.body).on('click touchstart', '.share', function(e){
        e.preventDefault();
        showOverlay();
        $(".share-modal").fadeIn();
    });

    // close the share modal
    jQuery(document.body).on('click touchstart', '.close-modal', function(e){
        e.preventDefault();
        hideOverlay();
        $(".share-modal").fadeOut();
    });

    $('body').keyup(function(e){
       if(e.keyCode == 32){
          loadImageAjax();
       }
    });

    // needs support for passing in a variable of image id for single
    function loadImageAjax()
    {
        $.ajax({
            url: "/php/loadimage.php",
            dataType : 'json',
            beforeSend:function(){
                // add spinner for loading
                $('.load-new-image i').addClass('fa-spin');
            },
            success:function(data){
                if (data.error && data.error === 100) {
                    window.location.replace("http://doseofstance.com/");
                }

                if (data.already_voted) {
                    modifyUpvote('disable');
                } else {
                    modifyUpvote('enable');
                }
                console.log(data);
                // change the image attributes
                $('.main-image').attr("src", "/assets/images/cars/"+data.image_name+".jpg");
                $('.main-image').attr("data-imageid", data.rowId);
                $('.direct-link').attr('value', "http://www.doseofstance.com/image/"+data.rowId);
                $('.facebook').attr('href', "https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdoseofstance.com/image/"+data.rowId);
                setTimeout(function(){
                    $('.load-new-image i').removeClass('fa-spin');
                }, 500);
            }
        });
    };

    // add row to the db via ajax, needs validation and anti spam etc
    function upvoteAjax()
    {
        var imageid = $(".main-image").attr("data-imageid");
        $.ajax({
            type: 'POST',
            url: '/php/upvoteimage.php?imageid='+imageid,
            dataType : 'json',
            beforeSend:function(){
                // add spinner for loading
                modifySpinner("fa-arrow-up", ".vote-up i", 'add');
            },
            success:function(data){
                if (data.success) {
                    // done, remove spinner
                    modifyUpvote('disable');
                    modifySpinner("fa-arrow-up", ".vote-up i");
                } else {
                    modifyUpvote('error');
                    modifySpinner("fa-ban", ".vote-up i");
                }
            }
        });
    };

    function modifyUpvote(status)
    {
        if (status === 'enable') {
            $(".vote-up i").removeClass("fa-check")
            .addClass("fa-arrow-up");
            $(".vote-up").removeClass("vote-up-disabled").removeClass("vote-up-error").addClass("vote-up-enabled");
            $(".upvote-text").html('UPVOTE');
        } else if (status === 'error') {
            $(".vote-up i").removeClass("fa-arrow-up")
            .addClass("fa-ban");
            $(".vote-up").removeClass("vote-up-enabled").addClass("vote-up-error");
            $(".upvote-text").html('ERROR');
        } else if (status === 'disable') {
            $(".vote-up i").removeClass("fa-arrow-up").removeClass("fa-ban")
            .addClass("fa-check");
            $(".vote-up").removeClass("vote-up-enabled").addClass("vote-up-disabled");
            $(".upvote-text").html('VOTED');
        }
    }

    function modifySpinner(currentIcon, selector, spinType)
    {
        var spinType = spinType || "remove"

        if (spinType === 'add') {
            $(selector).removeClass(currentIcon);
            $(selector).addClass("fa-refresh").addClass("fa-spin");
        } else {
            $(selector).removeClass("fa-refresh").removeClass("fa-spin");
            $(selector).addClass(currentIcon);
        }
    }

    function showOverlay()
    {
        $(".overlay").fadeIn();
    }

    function hideOverlay()
    {
        $(".overlay").fadeOut();
    }

});
