<?php
// submit_score.php

include 'db.php';                // pulls in $pdo
header('Content-Type: application/json');

try {
    // Ensure required fields exist
    if (empty($_POST['judge_id']) || empty($_POST['participant_id']) || !isset($_POST['score'])) {
        throw new Exception("All fields are required");
    }

    // Insert the score
    $stmt = $pdo->prepare(
        "INSERT INTO scores (judge_id, participant_id, score) VALUES (:j, :p, :s)"
    );
    $stmt->execute([
        ':j' => $_POST['judge_id'],
        ':p' => $_POST['participant_id'],
        ':s' => $_POST['score']
    ]);

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
