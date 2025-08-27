<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $conn = new mysqli('localhost', 'root', '', 'CustomerInfo');

  if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
  }

  $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
  if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
  }

  $conn->close();
}
?>
<form method="POST" action="update_handler.php">
  <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
  <label>Name:</label><input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
  <label>Email:</label><input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
  <label>Phone:</label><input type="text" name="phone" value="<?php echo $user['phone']; ?>" required><br>
  <label>Address:</label><input type="text" name="address" value="<?php echo $user['address']; ?>" required><br>
  <button type="submit">Update</button>
</form>
