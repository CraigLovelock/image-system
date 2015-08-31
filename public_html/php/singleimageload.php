<?php
require ('conn.php');

$singleImage = False;
$image_link = "";
$imageId = "";
$vote_class = "enabled";
$vote_text = "UPVOTE";

try {

	if (isset($_GET['image'])) {
		$imageId = $_GET['image'];
		validateId($imageId);
		$stmt = $conn->prepare("SELECT * FROM images where id = :id");
		$stmt->execute([':id' => $imageId]);
		$result = $stmt->fetch();

		if (!$result) {
			redirect();
		} else {
			// check if the user has already voted on image
			if ( isset($_COOKIE['voted_on']) ) {
				$votedArray = explode(',', $_COOKIE['voted_on']);
				if (in_array($result['id'], $votedArray)) {
					$vote_class = "disabled";
					$vote_text = "VOTED";
				}
			}

			$singleImage = true;

			$image_link = "/assets/images/cars/".$result['image_name'].".jpg";
			$imageId = $result['id'];
		}

	}

} catch(PDOException $e) {
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/404.php">';
}

function validateId($id)
{
	if (!is_numeric($id)) {
		redirect();
	}
}

function redirect()
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/">';
	exit();
}

?>