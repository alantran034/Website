<?php
include 'db_user.php';  // Kết nối user_db

$sql = "SELECT username, email, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Danh sách khách hàng</title>
  <style>
    table { border-collapse: collapse; width: 50%; margin: 20px auto; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    th { background-color: #f2a6c1; color: white; }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Danh sách khách hàng</h2>
  <table>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Ngày tạo</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='3'>Chưa có khách hàng</td></tr>";
    }
    ?>
  </table>
</body>
</html>
