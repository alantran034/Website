<?php
session_start();
include '../db.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
  } else {
    $error = "Sai tên đăng nhập hoặc mật khẩu!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập Admin</title>
  <style>
    body { font-family: Arial; background: #f2f2f2; }
    .box {
      width: 300px; margin: 100px auto; background: white;
      padding: 20px; border-radius: 8px; box-shadow: 0 0 5px gray;
    }
    input, button { width: 100%; padding: 8px; margin: 8px 0; }
  </style>
</head>
<body>
  <div class="box">
    <h3>Đăng nhập quản trị</h3>
    <form method="post">
      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <button type="submit" name="login">Đăng nhập</button>
    </form>
    <p style="color:red"><?php echo $error ?? ''; ?></p>
  </div>
</body>
</html>
