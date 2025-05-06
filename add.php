<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $stmt = $conn->prepare("INSERT INTO users (username, email, phone_number) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $phone);
  $stmt->execute();

  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">
    <h3>Add New User</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Phone Number</label>
        <input type="text" name="phone" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>

</body>
</html>
