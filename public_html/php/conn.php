<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

// all connection information for PDO
$domain = $_SERVER['HTTP_HOST'];

if ($domain == 'localhost') {
	$host = '127.0.0.1';
	$dbname = 'every_hour';
	$username = 'root';
	$password = 'root';
} else {
	$host = 'localhost';
	$dbname = 'every_hour';
	$username = 'doseofst_craig';
	$password = 'wireless';
}

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