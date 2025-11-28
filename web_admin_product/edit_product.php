<?php
include '../db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $image = $_POST['image'];

  $sql = "UPDATE products 
          SET name='$name', price='$price', category='$category', description='$description', image='$image'
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('✅ Cập nhật thành công!'); window.location='products.php';</script>";
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
<title>Sửa sản phẩm - Berry & Brew</title>
<style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #fff8f6;
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

  h2 {
    text-align: center;
    color: #d6336c;
    margin-top: 25px;
  }

  .form-container {
    max-width: 500px;
    margin: 30px auto;
    background: #ffe6eb;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  label {
    font-weight: 600;
    color: #8b0000;
    margin-top: 10px;
    display: block;
  }

  input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    margin-top: 6px;
    font-size: 14px;
    outline: none;
    transition: 0.3s;
  }

  input:focus, textarea:focus { border-color: #ff6f91; }

  button {
    background: #ff8fa3;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 15px;
    transition: 0.3s;
  }

  button:hover { background: #ff6f91; }

  a.back {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #d6336c;
    text-decoration: none;
    font-weight: 500;
  }

  a.back:hover { text-decoration: underline; }

  footer {
    text-align: center;
    padding: 15px;
    color: #777;
    font-size: 14px;
    margin-top: 40px;
  }
</style>
</head>
<body>

<header class="main-header">
  <img src="../image/LOGO.jpg" class="logo" alt="Berry & Brew">
</header>

<h2>✏️ Sửa sản phẩm</h2>

<div class="form-container">
  <form method="POST">
    <label>Tên sản phẩm:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>

    <label>Giá:</label>
    <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($product['price']); ?>" required>

    <label>Danh mục:</label>
    <input type="text" name="category" value="<?= htmlspecialchars($product['category']); ?>">

    <label>Mô tả:</label>
    <textarea name="description"><?= htmlspecialchars($product['description']); ?></textarea>

    <label for="image">Hình ảnh sản phẩm:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    
    <button type="submit">💾 Lưu thay đổi</button>
  </form>

  <a href="products.php" class="back">← Quay lại danh sách sản phẩm</a>
</div>

<footer>© 2025 Berry & Brew - All Rights Reserved</footer>
</body>
</html>
