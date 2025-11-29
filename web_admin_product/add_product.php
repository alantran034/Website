<?php
include '../db.php'; // Kết nối tới file db.php trong thư mục Website

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $image = $_FILES['image']['name'];
  $target = "../image/" . basename($image);

  $sql = "INSERT INTO products (name, price, category, image) VALUES ('$name', '$price', '$category', '$image')";

  if ($conn->query($sql) === TRUE) {
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    echo "<script>alert('✅ Thêm sản phẩm thành công!'); window.location='add_product.php';</script>";
  } else {
    echo "<script>alert('❌ Lỗi: " . $conn->error . "');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thêm sản phẩm - Berry & Brew</title>
<style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #fff8f6;
    color: #333;
  }

  /* ===== THANH TRÊN CÙNG ===== */
  .top-bar {
    background: #ffe6eb;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 15px;
    padding: 6px 30px;
    font-size: 14px;
  }

  .top-bar a {
    text-decoration: none;
    color: #d6336c;
    font-weight: 500;
    cursor: pointer;
    transition: 0.3s;
  }

  .top-bar a:hover {
    color: #ff6f91;
  }

  .cart-btn {
    background: #ff8fa3;
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
  }

  .cart-btn:hover {
    background: #ff6f91;
  }

  /* ===== HEADER ===== */
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

  /* ===== MENU ===== */
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

  .navbar a:hover {
    color: #fff;
  }

  /* ===== FORM THÊM SẢN PHẨM ===== */
  .add-product-section {
    max-width: 700px;
    margin: 40px auto;
    background: #ffe6eb;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  .add-product-section h2 {
    color: #d6336c;
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
  }

  form label {
    font-weight: 500;
    display: block;
    margin-bottom: 6px;
    color: #8b0000;
  }

  form input[type="text"],
  form input[type="number"],
  form select,
  form input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 14px;
    box-sizing: border-box;
  }

  form input:focus,
  form select:focus {
    border-color: #ff8fa3;
    outline: none;
    box-shadow: 0 0 5px rgba(255,111,145,0.4);
  }

  button {
    width: 100%;
    background: #ff8fa3;
    border: none;
    color: white;
    padding: 12px;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
  }

  button:hover {
    background: #ff6f91;
  }

  .back-link {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #d6336c;
    text-decoration: none;
    font-weight: 500;
  }

  .back-link:hover {
    color: #ff6f91;
  }

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

<!-- Thanh trên cùng -->
<div class="top-bar">
  <a href="../giohang.php" class="cart-btn">🛒 Giỏ hàng</a>
</div>

<!-- Header -->
<header class="main-header">
  <img src="../image/LOGO.jpg" class="logo" alt="Berry & Brew">
</header>

<!-- Menu -->
<nav class="navbar">
  <a href="../Webbandoandouong.php">Trang Chủ</a>
  <a href="../gioithieu.php">Giới Thiệu</a>
  <a href="../sanpham.php">Sản Phẩm</a>
</nav>

<!-- Nội dung thêm sản phẩm -->
<section class="add-product-section">
  <h2>➕ Thêm Sản Phẩm Mới</h2>
  <form method="POST" enctype="multipart/form-data">
    <label for="name">Tên sản phẩm:</label>
    <input type="text" id="name" name="name" placeholder="Nhập tên sản phẩm..." required>

    <label for="price">Giá (VNĐ):</label>
    <input type="number" id="price" name="price" placeholder="Nhập giá..." required>

    <label for="category">Danh mục:</label>
    <select name="category" id="category" required>
      <option value="">-- Chọn danh mục --</option>
      <option value="banhmi">Bánh mì</option>
      <option value="snack">Snack</option>
      <option value="nuocngot">Nước ngọt</option>
      <option value="nuocloc">Nước lọc</option>
      <option value="dokho">Đồ khô</option>
      <option value="dosay">Đồ sấy</option>
      <option value="hatdinhduong">Hạt dinh dưỡng</option>
      <option value="doanlien">Đồ ăn liền</option>
      <option value="keo">Kẹo</option>
    </select>

    <label for="image">Hình ảnh sản phẩm:</label>
    <input type="file" id="image" name="image" accept="image/*" required>

    <button type="submit" name="submit">Thêm sản phẩm</button>
  </form>

  <a href="products.php" class="back-link">← Quay lại danh sách sản phẩm</a>
</section>

<!-- Footer -->
<footer>© 2025 Berry & Brew - All Rights Reserved</footer>

</body>
</html>
