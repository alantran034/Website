<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Berry & Brew</title>
  <link rel="stylesheet" href="css/database.css">
  <style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #fff8f6;
    color: #333;
  }

  /* ===== HEADER ===== */
  .main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffccd5;
    padding: 10px 40px;
  }

  .logo {
    width: 120px;
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(255, 182, 193, 0.6);
  }

  .navbar {
    flex-grow: 1;
    display: flex;
    justify-content: center;
    gap: 25px;
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

  .header-right {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .search-box input {
    padding: 6px 10px;
    border-radius: 20px;
    border: 1px solid #ccc;
    outline: none;
    width: 150px;
    transition: 0.3s;
  }

  .search-box input:focus {
    width: 200px;
    border-color: #ff6f91;
  }

  /* ===== NỘI DUNG CHÍNH ===== */
  .main-content {
    display: flex;
    flex-direction: column;
    max-width: 900px;
    margin: 30px auto;
    gap: 20px;
  }

  .about-section {
    background: #ffe6eb;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    text-align: center;
    line-height: 1.8;
  }

  .about-section h2 {
    color: #d6336c;
    margin-bottom: 20px;
    font-size: 26px;
  }

  .about-section p {
    font-size: 16px;
    color: #555;
  }

  .about-section a {
    text-decoration: none;
    color: #d6336c;
    font-weight: 600;
    margin: 0 5px;
  }

  .about-section a:hover {
    text-decoration: underline;
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

  <!-- HEADER -->
  <header class="main-header">
    <img src="image/LOGO.jpg" class="logo" alt="Berry & Brew">

    <nav class="navbar">
      <a href="dashboard.php">Dashboard</a>
      <a href="products.php">Quản lý sản phẩm</a>
    <!--   <a href="../thanhtoan.html">Quản lý đơn hàng</a> -->
      <a href="logout.php">Đăng xuất</a>
    </nav>

    <div class="header-right">
      <div class="search-box">
        <input type="text" placeholder="Tìm kiếm...">
      </div>
    </div>
  </header>

  <!-- NỘI DUNG CHÍNH -->
  <div class="main-content" style="flex-direction: column; max-width: 900px; margin: 30px auto; gap: 20px;">

    <div class="about-section">
      <h2>Xin chào, <?php echo $_SESSION['admin']; ?>!</h2>
      <p>Chào mừng bạn đến trang quản trị của Berry & Brew.</p>
      <p>
        <a href="products.php">Quản lý sản phẩm</a> 
     <!--    <a href="../thanhtoan.html">Quản lý đơn hàng</a> -->
        <a href="logout.php">Đăng xuất</a>
      </p>
    </div>

  </div>

  <footer>© 2025 Berry & Brew - All Rights Reserved</footer>

</body>
</html>
