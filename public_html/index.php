<!doctype html>
<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dose Of Stance</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <?php
    require ('./php/singleimageload.php');
    ?>

    <?php include ('includes/_header.php'); ?>

    <div class="image-holder">
        <img class="main-image" src="/assets/images/cars/<?= $return['image_name']; ?>.jpg" alt="" data-imageid="<?= $return['image_id']; ?>">
    </div>

    <footer>
        <div class="lower-buttons">
            <div class="vote-up vote-up-enabled">
                <i class="fa fa-arrow-up"></i>
                <span class="upvote-text">UPVOTE</span>
            </div>

            <div class="load-new-image">
                <i class="fa fa-refresh"></i>
                <span>CHANGE IMAGE</span>
            </div>
            <div class="share">
                <i class="fa fa-share-alt"></i>
                <span>SHARE</span>
            </div>
        </div>
    </footer>

    <div class="share-modal">
        <h3>SHARE THIS IMAGE</h3>

        <div class="share-links">
            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdoseofstance.com/image/<?= $return['image_id'] ?>" target="_blank">
                Share On Facebook
            </a>

            Direct Link:
            <input class="direct-link" type="text" value="http://www.doseofstance.com/image/<?= $return['image_id'] ?>">
        </div>
    </div>

    <div class="warning">
        <span>
            <i class="fa fa-mobile fa-spin"></i> <br>
            Turn Device Landscape
        </span>
    </div>

    <div class="overlay"></div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
