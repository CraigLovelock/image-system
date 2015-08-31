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
    <title>Dose Of Stance | Top 15 Voted</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <?php include ('includes/_header.php'); ?>

    <?php
    require 'php/conn.php';
    $stmt = $conn->prepare(
'SELECT *
  from images
    left join
      (select image_id, count(*) count
           from votes
         group by image_id) c
    on image_id=images.id
  order by count DESC'
        );
    $stmt->execute();
    $results = $stmt->fetchAll();
    ?>

    <?php foreach ($results as $result) { ?>
    <a href="/find/<?= $result[0] ?>" >
    <div class="home-single-image">
        <img src="/assets/images/cars/<?= $result['image_name'] ?>.jpg"/>
        <div class="single-car-overlay">
        </div>
        <div class="ghost-button">
            View Image
        </div>
    </div>
    </a>
    <?php   } ?>

    <?php include ("includes/_scripts.php") ?>

</body>
</html>
