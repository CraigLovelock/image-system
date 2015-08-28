<?php

$return = [];

$value = 0;
if ( isset($_COOKIE['voted_on']) ) {
	$value = $_COOKIE['voted_on'];
	$votedArray = explode(',', $_COOKIE['voted_on']);
}

$image_id = $_GET['imageid'];

require ("conn.php");

// get all existing rows
try {
	$stmt = $conn->prepare('SELECT id FROM images');
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $r) {
		$rowArray[] = $r['id'];
	}
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

try {
	if (!in_array($image_id, $votedArray) && in_array($image_id, $rowArray)) {
		$query = "INSERT INTO votes (image_id, created_at) VALUES (:image_id, NOW())";
		$q = $conn->prepare($query);
		$q->execute(
			[
				':image_id'=>$image_id
			]);

		// set cookie for voted on cars
		setcookie(
			"voted_on",
			$value.','.$image_id,
			time() + (10 * 365 * 24 * 60 * 60),
			"/"
		);

		$return['success'] = true;
	}
	echo json_encode($return);

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
	exit();
}

?>