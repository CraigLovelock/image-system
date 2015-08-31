<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dose Of Stance | Your Daily Of Stance</title>
    <meta name="description" content="Your Daily Dose Of Stance. The source for the best stance images for inspiration and voting.">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<body>

    <?php require ('./php/singleimageload.php'); ?>

    <?php include ('includes/_header.php'); ?>

    <div class="image-holder">
        <img class="main-image" src="<?= $image_link ?>" alt="" data-imageid="<?= $imageId ?>">
    </div>

    <footer>
        <div class="lower-buttons">
            <div class="vote-up vote-up-<?= $vote_class ?>">
                <i class="fa fa-arrow-up"></i>
                <span class="upvote-text"><?= $vote_text ?></span>
            </div>

            <div class="load-new-image">
                        <?php if (!$singleImage) { ?>
                <i class="fa fa-refresh"></i>
                <span>CHANGE IMAGE</span>
                <?php } ?>
            </div>
            <div class="share">
                <i class="fa fa-share-alt"></i>
                <span>SHARE</span>
            </div>
        </div>
    </footer>

    <?php include ('includes/_sharemodal.php'); ?>

    <div class="warning">
        <span>
            <i class="fa fa-mobile fa-spin"></i> <br>
            Turn Device Landscape
        </span>
    </div>

    <div class="overlay"></div>

    <?php include ("includes/_scripts.php") ?>
</body>
</html>
