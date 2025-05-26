<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Public Scoreboard</title>
  <meta http-equiv="refresh" content="10">
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <nav>
    <a href="admin.php">Admin</a>
    <a href="judge.php">Judge portal</a>
    <a href="index.php" class="active">Scoreboard</a>
  </nav>
<div class="container">
  <h1>Scoreboard</h1>
  <table>
    <tr><th>Participant</th><th>Total Score</th></tr>
    <?php
      $sql = "
        SELECT p.name, SUM(s.points) AS total_score
        FROM participants p
        LEFT JOIN scores s ON p.id = s.participant_id
        GROUP BY p.id
        ORDER BY total_score DESC
      ";
      $res = $conn->query($sql);
      while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['name']}</td><td>{$row['total_score']}</td></tr>";
      }
    ?>
  </table>
  </div>
  <script src="assets/script.js"></script>
</body>
</html>


