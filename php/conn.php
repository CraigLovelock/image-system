<?php

// all connection information for PDO
$host = '127.0.0.1';
$dbname = 'every_hour';
$username = 'root';
$password = 'root';

try {
	$conn = new PDO(
		"mysql:host = $host;dbname=$dbname",
		$username,
		$password
	);
	// show errors
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

?>