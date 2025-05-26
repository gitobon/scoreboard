<?php
// add_judge.php

include 'db.php';                // pulls in $pdo (Postgres PDO)
header('Content-Type: application/json');

try {
    // Validate input
    if (empty($_POST['username']) || empty($_POST['display_name'])) {
        throw new Exception("Both username and display name are required");
    }

    // Insert with PDO and named parameters
    $stmt = $pdo->prepare(
        "INSERT INTO judges (username, display_name) VALUES (:u, :d)"
    );
    $stmt->execute([
        ':u' => $_POST['username'],
        ':d' => $_POST['display_name']
    ]);

    echo json_encode([
        'success' => true,
        'message' => 'Judge added successfully'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
