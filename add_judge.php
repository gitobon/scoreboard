<?php
include 'db.php';
header('Content-Type: application/json');
try {
$stmt = $pdo->prepare(
  "INSERT INTO judges (username, display_name) VALUES (:u, :d)"
);
$stmt->execute([
  ':u' => $_POST['username'],
  ':d' => $_POST['display_name']
]);
  echo json_encode(['success'=>true,'message'=>'Judge added successfully']);
} catch(Exception $e) {
  echo json_encode(['success'=>false,'message'=>$conn->error]);
}
