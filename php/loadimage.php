<?php

$return = [];

require ('conn.php');

sleep(1);

try {
  $stmt = $conn->prepare('SELECT * FROM images ORDER BY rand() LIMIT 1');
  $stmt->execute();
  $result = $stmt->fetch();

  $return['image_name'] = $result['image_name'];
  $return['rowId'] = $result['id'];

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

echo json_encode($return);

?>
