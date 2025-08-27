<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Table</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Sl no</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'CustomerInfo');

        if ($conn->connect_error) {
          die('Connection Failed: ' . $conn->connect_error);
        }

        // Fetch data from the 'user' table using GET method
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $sl_no = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$sl_no}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>
                      <a href='update.php?id={$row['id']}' class='btn-update'>Update</a>
                      <a href='delete.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
            $sl_no++;
          }
        } else {
          echo "<tr><td colspan='6'>No records found</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
  <script src="admin.js"></script>
</body>
</html>
