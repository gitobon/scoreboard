<?php
include 'db.php';
header('Content-Type: application/json');

try {
    // ensure required fields exist
    if (empty($_POST['judge_id']) || empty($_POST['participant_id']) || !isset($_POST['points'])) {
        throw new Exception("All fields are required");
    }

    // prepare & execute insert
    $stmt = $conn->prepare(
      "INSERT INTO scores (judge_id, participant_id, points) VALUES (?, ?, ?)"
    );
    $stmt->bind_param(
      "iii",
      $_POST['judge_id'],
      $_POST['participant_id'],
      $_POST['points']
    );

    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    echo json_encode([
      'success' => true,
      'message' => 'Score submitted successfully'
    ]);

} catch (Exception $e) {
    echo json_encode([
      'success' => false,
      'message' => $e->getMessage()
    ]);
}

