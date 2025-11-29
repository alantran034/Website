<?php
session_start();
include '../db.php';

if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lý sản phẩm - Berry & Brew</title>
<style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #fff8f6;
    color: #333;
  }

  .main-header {
    background: #ffccd5;
    text-align: center;
    padding: 15px 0;
  }

  .logo {
    width: 120px;
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(255,182,193,0.6);
  }

  .navbar {
    background: #ffb6c1;
    display: flex;
    justify-content: center;
    gap: 40px;
    padding: 10px 0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  .navbar a {
    text-decoration: none;
    color: #8b0000;
    font-weight: 600;
    transition: 0.3s;
  }

  .navbar a:hover { color: #fff; }

  h2 {
    text-align: center;
    color: #d6336c;
    margin-top: 30px;
  }

  .container {
    max-width: 1000px;
    margin: 30px auto;
    background: #ffe6eb;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
  }

  th, td {
    border: 1px solid #ffd6e0;
    padding: 10px;
    text-align: center;
  }

  th {
    background: #ff8fa3;
    color: #fff;
  }

  tr:nth-child(even) { background: #fff0f3; }

  a.action {
    background: #ffb6c1;
    color: #8b0000;
    padding: 5px 10px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
  }

  a.action:hover { background: #ff6f91; color: #fff; }

  .top-btns {
    text-align: center;
    margin-bottom: 15px;
  }

  .top-btns a {
    background: #ff8fa3;
    color: white;
    padding: 8px 15px;
    border-radius: 25px;
    margin: 0 5px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
  }

  .top-btns a:hover { background: #ff6f91; }

  footer {
    text-align: center;
    padding: 15px;
    color: #777;
    font-size: 14px;
    margin-top: 30px;
  }
</style>
</head>
<body>

<header class="main-header">
  <img src="../image/LOGO.jpg" class="logo" alt="Berry & Brew">
</header>

<nav class="navbar">
  <a href="../Webbandoandouong.html">Trang Chủ</a>
  <a href="../gioithieu.html">Giới Thiệu</a>
  <a href="../sanpham.php">Sản Phẩm</a>
</nav>

<h2>🍰 Quản lý sản phẩm</h2>

<div class="container">
  <div class="top-btns">
    <a href="add_product.php">➕ Thêm sản phẩm</a>
    <a href="dashboard.php">⬅ Trở lại Dashboard</a>
  </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Danh mục</th>
      <th>Mô tả</th>
      <th>Ảnh</th>
      <th>Hành động</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= number_format($row['price'], 0, ',', '.') ?>đ</td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td>
          <?php if (!empty($row['image'])): ?>
            <img src="<?= htmlspecialchars($row['image']) ?>" width="70">
          <?php else: ?>
            (Không có ảnh)
          <?php endif; ?>
        </td>
        <td>
          <a class="action" href="edit_product.php?id=<?= $row['id'] ?>">✏️ Sửa</a>
          <a class="action" href="delete_product.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">🗑 Xóa</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>

<footer>© 2025 Berry & Brew - All Rights Reserved</footer>
</body>
</html>
