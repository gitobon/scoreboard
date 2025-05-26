<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"><title>Admin – Add Judge</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <nav>
    <a href="admin.php" class="active">Admin</a>
    <a href="judge.php">Judge portal</a>
    <a href="index.php">Scoreboard</a>
  </nav>
  <div class="container">
    <h1>You are Welcomed Admin</h1>
    <h2>Add Judge</h2>
    <form class="ajax" action="add_judge.php" method="POST">
      <label>Username<input name="username" required></label>
      <label>Display Name<input name="display_name" required></label>
      <button type="submit">Add Judge</button>
    </form>
  </div>
  <script src="assets/script.js"></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $display_name = $_POST['display_name'];
    $stmt = $conn->prepare("INSERT INTO judges (username, display_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $display_name);
    if ($stmt->execute()) {
        echo "<p>Judge added successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>
</body>
</html>

