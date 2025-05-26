<?php
include 'db.php';

$sql = "
CREATE TABLE IF NOT EXISTS judges (
  id SERIAL PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  display_name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS participants (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS scores (
  id SERIAL PRIMARY KEY,
  judge_id INT NOT NULL REFERENCES judges(id),
  participant_id INT NOT NULL REFERENCES participants(id),
  points INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO participants (name) VALUES
('Alice'),
('Bob'),
('Charlie'),
('Diana');
";

try {
  $pdo->exec($sql);
  echo "Database initialized successfully.";
} catch (PDOException $e) {
  echo "DB Error: " . $e->getMessage();
}
?>
