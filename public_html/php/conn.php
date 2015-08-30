<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

// all connection information for PDO
$domain = $_SERVER['HTTP_HOST'];

if ($domain == 'localhost') {
	$dsn = 'mysql:dbname=every_hour;host=127.0.0.1';
	$user = 'root';
	$password = 'root';
} else {
	$dsn = 'mysql:dbname=doseofst_every_hour;host=localhost';
	$user = 'doseofst_craig';
	$password = 'wireless';
}

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>