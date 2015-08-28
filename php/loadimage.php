<?php

$return = [];

require ('conn.php');

$value = 0;
if ( isset($_COOKIE['viewed']) ) {
	$value = $_COOKIE['viewed'];
}

$ids     = explode(',', $value);
$inQuery = implode(',', array_fill(0, count($ids), '?'));

try {

	$stmt = $conn->prepare(
		'SELECT *
		FROM images
		WHERE id NOT IN(' . $inQuery . ')
		ORDER BY rand()
		LIMIT 1'
		);

	foreach ($ids as $k => $id) {
		$stmt->bindValue(($k+1), $id);
	}
	$stmt->execute();
	$result = $stmt->fetch();

	if (!$result) {
		$return['error'] = 100;
	} else {

		// check if the user has already voted on image
		if ( isset($_COOKIE['voted_on']) ) {
			$votedArray = explode(',', $_COOKIE['voted_on']);

			if (in_array($result['id'], $votedArray)) {
				$return['already_voted'] = true;
			}
		}

		$return['image_name'] = $result['image_name'];
		$return['rowId'] = $result['id'];
		$return['cookie'] = $value;
	}

	// set cookie for all viewed cars
	/* ignored for testing
	$cookie_name = "viewed";
	$cookie_value = $value.','.$return['rowId'];
	setcookie(
		$cookie_name,
		$cookie_value,
		time() + (10 * 365 * 24 * 60 * 60),
		"/"
		);
	*/

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

echo json_encode($return);

?>
