<?php

require 'conn.php';

$ds = DIRECTORY_SEPARATOR;
$storeFolder = 'images/cars';

if (!empty($_FILES)) {
	// define name
    $image_name = $_FILES['file']['size'] . '-' . time();

    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = $_SERVER["DOCUMENT_ROOT"] . $ds . $storeFolder . $ds;
    $targetFile =  $targetPath. $image_name . '.jpg';

    // insert into db
    $query = "INSERT INTO images (image_name, created_at) VALUES (:image_name, NOW() )";
	$q = $conn->prepare($query);
	$q->execute([':image_name' => $image_name]);

    $image = move_uploaded_file($tempFile, $targetFile);

    if ($image) {
    	return true;
    }
}
?>