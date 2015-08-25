$("document").ready(function(){

    // first page load, if no image currently set then fetch an image using same method for ajax call
    if ( ! $('.main-image').attr("src") ) {
        loadImageAjax();
    }

    // on page refesh button click, perform ajax call
    jQuery(document.body).on('click', '.page-refresh', function(e){
        e.preventDefault();
        loadImageAjax();
    });

    // upvote the image
    jQuery(document.body).on('click', '.vote-up', function(e){
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
            url: 'php/loadimage.php',
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
            }
        });
    };

    // add row to the db via ajax, needs validation and anti spam etc
    function upvoteAjax()
    {
        var imageid = $(".main-image").attr("data-imageid");
        $.ajax({
            type: 'POST',
            url: 'php/upvoteimage.php?imageid='+imageid,
            dataType : 'json',
            beforeSend:function(){
                // add spinner for loading
                modifySpinner("fa-arrow-up", ".vote-up i", 'add');
            },
            success:function(data){
                // done, remove spinner
                modifySpinner("fa-arrow-up", ".vote-up i");

            }
        });
    };

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
