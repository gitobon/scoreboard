<?php
// submit_score.php
include 'db.php';
header('Content-Type: application/json');

try {
    if (empty($_POST['judge_id']) || empty($_POST['participant_id']) || !isset($_POST['points'])) {
        throw new Exception("All fields are required");
    }

    $stmt = $pdo->prepare(
        "INSERT INTO scores (judge_id, participant_id, points) VALUES (:j, :p, :s)"
    );
    $stmt->execute([
        ':j' => $_POST['judge_id'],
        ':p' => $_POST['participant_id'],
        ':s' => $_POST['points']
    ]);

    echo json_encode(['success'=>true,'message'=>'Score submitted successfully']);

} catch (Exception $e) {
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}

