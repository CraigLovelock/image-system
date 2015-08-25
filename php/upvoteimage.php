<?php

$return = [];

$image_id = $_GET['imageid'];

sleep(1);

require ("conn.php");

try {
	$query = "INSERT INTO votes (image_id, created_at) VALUES (:image_id, NOW())";
	$q = $conn->prepare($query);
	$q->execute(
		[
			':image_id'=>$image_id
		]);

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
	exit();
}

$return['success'] = true;

echo json_encode($return);

?>