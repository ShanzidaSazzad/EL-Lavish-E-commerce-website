<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];


  $conn = new mysqli('localhost', 'root', '', 'CustomerInfo');

  if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
  }

  $stmt = $conn->prepare("UPDATE user SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
  if ($stmt) {
    $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
    if ($stmt->execute()) {
      echo "User updated successfully!";
    } else {
      echo "Error updating user: " . $stmt->error;
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
