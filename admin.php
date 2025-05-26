<?php 
// admin.php
include 'db.php'; // ensures $pdo is available if you ever need it
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin – Add Judge</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <!-- NAVBAR -->
  <nav>
    <a href="admin.php" class="active">Admin</a>
    <a href="judge.php">Judge Portal</a>
    <a href="index.php">Scoreboard</a>
  </nav>

  <div class="container">
    <h1>Welcome, Admin</h1>
    <h2>Add Judge</h2>
    <form class="ajax" action="add_judge.php" method="POST">
      <label>
        Username
        <input type="text" name="username" placeholder="e.g. judge_01" required>
      </label>
      <label>
        Display Name
        <input type="text" name="display_name" placeholder="e.g. Judge Judy" required>
      </label>
      <button type="submit">Add Judge</button>
    </form>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>
