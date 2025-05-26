<?php
include 'db.php';
header('Content-Type: application/json');
try {
  $stmt = $conn->prepare("INSERT INTO judges (username, display_name) VALUES (?, ?)");
  $stmt->bind_param("ss", $_POST['username'], $_POST['display_name']);
  $stmt->execute();
  echo json_encode(['success'=>true,'message'=>'Judge added successfully']);
} catch(Exception $e) {
  echo json_encode(['success'=>false,'message'=>$conn->error]);
}
