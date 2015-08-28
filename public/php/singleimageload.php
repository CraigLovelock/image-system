<?php
require ('conn.php');

$singleImage = False;

try {

	if (isset($_GET['image'])) {
		$imageId = $_GET['image'];
		validateId($imageId);
		$stmt = $conn->prepare("SELECT * FROM images where id = :id");
		$stmt->execute([':id' => $imageId]);
		$result = $stmt->fetch();

		if (!$result) {
			redirect();
		}

		$singleImage = true;

	} else {
		$stmt = $conn->prepare('SELECT * FROM images ORDER BY rand() LIMIT 1');
		$stmt->execute();
		$result = $stmt->fetch();
	}

	$return = [
		'image_name' => $result['image_name'],
		'image_id'   => $result['id'],
	];

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

function validateId($id)
{
	if (!is_numeric($id)) {
		redirect();
	}
}

function redirect()
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/top_voted">';
	exit();
}

?>