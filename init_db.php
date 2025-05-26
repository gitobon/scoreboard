<?php
// init_db.php — Run once, then delete this file

include 'db.php';   // PDO connection in db.php

try {
    // Remove duplicate participants (keep lowest id for each name)
    $sql = "
    DELETE FROM participants p1
    USING participants p2
    WHERE p1.name = p2.name
      AND p1.id > p2.id;
    ";
    $count = $pdo->exec($sql);

    echo "✅ Removed {$count} duplicate participant(s).";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}

