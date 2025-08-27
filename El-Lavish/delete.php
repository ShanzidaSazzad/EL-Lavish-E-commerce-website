<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $conn = new mysqli('localhost', 'root', '', 'CustomerInfo');

  if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
  }

  $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
  if ($stmt) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
      echo "User deleted successfully!";
    } else {
      echo "Error deleting user: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Failed to prepare the SQL statement: " . $conn->error;
  }

  $conn->close();
  header("Location: admin.php");
  exit;
}
?>
