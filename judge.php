<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Judge Portal</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <!-- NAVBAR -->
  <nav>
    <a href="judge.php" class="active">Judge</a>
    <a href="index.php">Scoreboard</a>
  </nav>

  <div class="container">
    <h1>Welcome Judge</h1>
    <h3>Submit Scores </h3>
    <form class="ajax" action="submit_score.php" method="POST">
      <label>
        Judge
        <select name="judge_id" required>
          <option value="" disabled selected>— Select Judge —</option>
          <?php
          $result = $conn->query("SELECT * FROM judges");
          while ($row = $result->fetch_assoc()) {
              echo "<option value='{$row['id']}'>".htmlspecialchars($row['display_name'])."</option>";
          }
          ?>
        </select>
      </label>

      <label>
        Participant
        <select name="participant_id" required>
          <option value="" disabled selected>— Select Participant —</option>
          <?php
            $res = $conn->query("SELECT * FROM participants");
            while($p = $res->fetch_assoc()) {
              echo "<option value=\"{$p['id']}\">".htmlspecialchars($p['name'])."</option>";
            }
          ?>
        </select>
      </label>

      <label>
        Score (1–100)
        <input type="number" name="points" placeholder="e.g. 65" min="1" max="100" required>
      </label>

      <button type="submit">Submit</button>
    </form>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>
