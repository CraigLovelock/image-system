$("document").ready(function(){

    // first page load, if no image currently set then fetch an image using same method for ajax call
    /*if ( ! $('.main-image').attr("src") ) {
        loadImageAjax();
    }*/

    // on page refesh button click, perform ajax call
    jQuery(document.body).on('click', '.page-refresh', function(e){
        e.preventDefault();
        loadImageAjax();
    });

    // upvote the image
    jQuery(document.body).on('click', '.vote-up-enabled', function(e){
        e.preventDefault();
        upvoteAjax();
    });

    // show the share modal
    jQuery(document.body).on('click', '.share', function(e){
        e.preventDefault();
        showOverlay();
        $(".share-modal").fadeIn();
    });

    // needs support for passing in a variable of image id for single
    function loadImageAjax()
    {
        $.ajax({
            url: '/php/loadimage.php',
            dataType : 'json',
            beforeSend:function(){
                // add spinner for loading
                $('.page-refresh i').addClass('fa-spin');
            },
            success:function(data){
                // done, remove spinner
                $('.page-refresh i').removeClass('fa-spin');
                // change the image attributes
                $('.main-image').attr("src", "/images/cars/"+data.image_name+".jpg");
                $('.main-image').attr("data-imageid", data.rowId);
                $('.direct-link').attr('value', "http://www.doseofstance.com/image/"+data.rowId);
                $('.facebook').attr('href', "https://twitter.com/intent/tweet?url=URL&");
                modifyUpvote('enable');
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
                // done, remove spinner
                modifySpinner("fa-arrow-up", ".vote-up i");
                modifyUpvote('disable');
            }
        });
    };

    function modifyUpvote(status)
    {
        if (status === 'enable') {
            $(".vote-up i").removeClass("fa-check")
            .addClass("fa-arrow-up");
            $(".vote-up").removeClass("vote-up-disabled").addClass("vote-up-enabled");
            $(".upvote-text").html('UPVOTE');
        } else {
            $(".vote-up i").removeClass("fa-arrow-up")
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

    // encode url for sharing use
    function encodeUrl() {
        var obj = document.getElementById('dencoder');
        var unencoded = obj.value;
        obj.value = encodeURIComponent(unencoded).replace(/'/g,"%27").replace(/"/g,"%22");
    }

});
