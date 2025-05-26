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
    <a href="judge.php">Judge</a>
    <a href="index.php" class="active">Scoreboard</a>
  </nav>

  <div class="container">
    <h1>Scoreboard</h1>
    <table>
      <tr><th>Participant</th><th>Total Score</th></tr>
      <?php
        // Use POSTGRES + PDO; SUM over 'score' column
        $sql = "
          SELECT p.name,
                 COALESCE(SUM(s.points), 0) AS total_score
          FROM participants p
          LEFT JOIN scores s
            ON p.id = s.participant_id
          GROUP BY p.id
          ORDER BY total_score DESC
        ";
        // Execute and fetch
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
          // escape output
          $name  = htmlspecialchars($row['name'],  ENT_QUOTES);
          $total = htmlspecialchars($row['total_score'], ENT_QUOTES);
          echo "<tr><td>{$name}</td><td>{$total}</td></tr>";
        }
      ?>
    </table>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>
