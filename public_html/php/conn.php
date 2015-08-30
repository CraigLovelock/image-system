<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

// all connection information for PDO
$domain = $_SERVER['HTTP_HOST'];

	$host = 'localhost';
	$dbname = 'doseofst_every_hour';
	$username = 'doseofst_craig';
	$password = 'wireless';

try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
	// show errors
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

?>