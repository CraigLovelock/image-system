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

	<header>
		<div class="header-container">
			<a href="/" class="return-home">Dose Of Stance | Top 10</a>
		</div>
	</header>

	<?php
	require 'php/conn.php';
	$stmt = $conn->prepare(
		'SELECT *
		FROM images
		LIMIT 10'
		);
	$stmt->execute();
	$results = $stmt->fetchAll();
	?>

	<?php foreach ($results as $result) { ?>
	<div class="home-single-image">
		<img src="/assets/images/cars/<?= $result['image_name'] ?>.jpg"/>
		<div class="single-car-overlay">
		</div>
		<a href="/image/<?= $result['id'] ?>" class="ghost-button">
			View Image
		</a>
	</div>
	<?php	} ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	<script src="/assets/js/app.js"></script>
</body>
</html>
