<?php
// init_db.php – run this once, then delete it

include 'db.php';    // pdo connection from db.php

try {
    $sql = file_get_contents(__DIR__ . '/schema.sql');
    $pdo->exec($sql);
    echo "✅ Tables created successfully!";
} catch (Exception $e) {
    echo "❌ Error creating tables: " . $e->getMessage();
}
