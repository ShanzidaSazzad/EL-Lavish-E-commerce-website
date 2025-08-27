<?php
$email = $_POST['email'];

$conn = new mysqli('localhost', 'root', '', 'CustomerInfo');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("DELETE FROM user WHERE email = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Order canceled successfully and data removed!";
            } else {
                echo "No order found for the given email.";
            }
        } else {
            echo "Error canceling the order: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement: " . $conn->error;
    }

    $conn->close();
}
?>  
