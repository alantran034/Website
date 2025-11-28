<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản phẩm - Berry & Brew</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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

    .search-box {
      position: relative;
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

    .cart-btn {
      background-color: #ff8fa3;
      color: white;
      padding: 6px 12px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .cart-btn:hover {
      background-color: #ff6f91;
    }

    /* ===== NỘI DUNG CHÍNH ===== */
    .main-content {
      display: flex;
      max-width: 1200px;
      margin: 30px auto;
      gap: 20px;
      padding: 0 20px;
    }

    .sidebar {
      width: 220px;
      background-color: #ffe6eb;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      height: fit-content;
    }

    .sidebar h3 {
      text-align: center;
      color: #d6336c;
      margin-top: 0;
    }

    .category-list {
      list-style: none;
      padding: 0;
      margin: 0 0 20px 0;
    }

    .category-list li {
      padding: 8px 10px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      margin-bottom: 5px;
    }

    .category-list li:hover {
      background-color: #ffb6c1;
      color: white;
    }

    .category-list li.active {
      background-color: #ff8fa3;
      color: white;
    }

    .filter-container {
      margin-top: 20px;
      padding-top: 20px;
      border-top: 2px solid #ffb6c1;
    }

    .filter-container label {
      display: block;
      color: #d6336c;
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .filter-container select {
      width: 100%;
      padding: 8px;
      border-radius: 8px;
      border: 1px solid #ffb6c1;
      background-color: white;
      color: #333;
      cursor: pointer;
      outline: none;
      transition: 0.3s;
    }

    .filter-container select:hover {
      border-color: #ff8fa3;
    }

    .product-area {
      flex: 1;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .product-item {
      background-color: #ffe6eb;
      border-radius: 10px;
      text-align: center;
      padding: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: 0.3s;
    }

    .product-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .product-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .product-item h4 {
      margin: 10px 0;
      color: #333;
      font-size: 16px;
    }

    .price {
      color: #d6336c;
      font-weight: bold;
      font-size: 18px;
      margin: 10px 0;
    }

    .product-item button {
      background-color: #ff8fa3;
      border: none;
      color: white;
      border-radius: 20px;
      padding: 8px 15px;
      cursor: pointer;
      transition: 0.3s;
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
    }

    .product-item button:hover {
      background-color: #ff6f91;
      transform: scale(1.05);
    }

    .no-products {
      text-align: center;
      color: #999;
      padding: 40px;
      grid-column: 1 / -1;
    }

    footer {
      text-align: center;
      padding: 15px;
      color: #777;
      font-size: 14px;
      margin-top: 30px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .main-header {
        flex-direction: column;
        padding: 15px;
      }

      .navbar {
        margin: 15px 0;
        flex-wrap: wrap;
      }

      .main-content {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
      }

      .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
      }
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="main-header">
    <img src="image/LOGO.jpg" class="logo" alt="Berry & Brew">
    <nav class="navbar">
      <a href="Webbandoandouong.html">Trang Chủ</a>
      <a href="gioithieu.html">Giới Thiệu</a>
      <a href="sanpham.php">Sản Phẩm</a>
      <a href="giohang.html">Giỏ Hàng</a>
    </nav>
    <div class="header-right">
      <div class="search-box">
        <input type="text" id="search-input" placeholder="Tìm kiếm..." onkeyup="searchProducts()">
      </div>
      <a href="giohang.html" class="cart-btn">🛒</a>
    </div>
  </header>
  
  <!-- NỘI DUNG CHÍNH -->
  <div class="main-content">
    <aside class="sidebar">
      <h3>Danh mục</h3>
      <ul class="category-list">
        <li class="active" onclick="showCategory('all')">Tất cả sản phẩm</li>
        <li onclick="showCategory('banhmi')">Bánh mì</li>
        <li onclick="showCategory('snack')">Snack</li>
        <li onclick="showCategory('nuocngot')">Nước ngọt</li>
        <li onclick="showCategory('nuocloc')">Nước lọc</li>
        <li onclick="showCategory('dokho')">Đồ Khô</li>
        <li onclick="showCategory('dosay')">Đồ Sấy</li>
        <li onclick="showCategory('hatdinhduong')">Hạt dinh dưỡng</li>
        <li onclick="showCategory('doanlien')">Đồ ăn liền</li>
        <li onclick="showCategory('keo')">Kẹo</li>
      </ul>

      <div class="filter-container">
        <label for="price-filter">🔍 Lọc theo giá:</label>
        <select id="price-filter" onchange="filterProducts()">
          <option value="all">Tất cả</option>
          <option value="under20">Dưới 20.000đ</option>
          <option value="20to30">20.000đ - 30.000đ</option>
          <option value="above30">Trên 30.000đ</option>
        </select>
      </div>
    </aside>

    <?php
    include 'db.php';
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    $products = [];
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $products[] = $row;
      }
    }
    $conn->close();
    ?>

    <section class="product-area">
      <div class="product-grid" id="product-grid">
        <?php
        if (count($products) > 0) {
          foreach($products as $row) {
            echo '
            <div class="product-item" data-category="' . strtolower($row['category']) . '" data-price="' . $row['price'] . '" data-name="' . strtolower($row['name']) . '">
              <img src="image/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">
              <h4>' . htmlspecialchars($row['name']) . '</h4>
              <p class="price">' . number_format($row['price']) . 'đ</p>
              <button onclick="addToCart(\'' . addslashes($row['name']) . '\',' . $row['price'] . ',\'image/' . htmlspecialchars($row['image']) . '\')">
                🛒 Thêm vào giỏ
              </button>
            </div>';
          }
        } else {
          echo '<div class="no-products">Chưa có sản phẩm nào!</div>';
        }
        ?>
      </div>
    </section>
  </div>

  <footer>© 2025 Berry & Brew - All Rights Reserved</footer>

  <!-- 🛍️ SCRIPT: Các chức năng -->
  <script>
    let currentCategory = 'all';
    let currentPriceFilter = 'all';

    // Hàm lọc theo danh mục
    function showCategory(category) {
      currentCategory = category;
      
      // Cập nhật trạng thái active cho danh mục
      const categoryItems = document.querySelectorAll('.category-list li');
      categoryItems.forEach(item => item.classList.remove('active'));
      event.target.classList.add('active');
      
      filterProducts();
    }

    // Hàm lọc sản phẩm
    function filterProducts() {
      const priceFilter = document.getElementById('price-filter').value;
      currentPriceFilter = priceFilter;
      const products = document.querySelectorAll('.product-item');
      let visibleCount = 0;

      products.forEach(product => {
        const category = product.getAttribute('data-category');
        const price = parseInt(product.getAttribute('data-price'));
        
        let showCategory = currentCategory === 'all' || category === currentCategory;
        let showPrice = true;

        // Lọc theo giá
        if (priceFilter === 'under20') {
          showPrice = price < 20000;
        } else if (priceFilter === '20to30') {
          showPrice = price >= 20000 && price <= 30000;
        } else if (priceFilter === 'above30') {
          showPrice = price > 30000;
        }

        if (showCategory && showPrice) {
          product.style.display = 'block';
          visibleCount++;
        } else {
          product.style.display = 'none';
        }
      });

      // Hiển thị thông báo nếu không có sản phẩm
      const grid = document.getElementById('product-grid');
      let noProductMsg = document.querySelector('.no-products');
      
      if (visibleCount === 0) {
        if (!noProductMsg) {
          noProductMsg = document.createElement('div');
          noProductMsg.className = 'no-products';
          noProductMsg.textContent = 'Không tìm thấy sản phẩm phù hợp!';
          grid.appendChild(noProductMsg);
        }
      } else {
        if (noProductMsg) {
          noProductMsg.remove();
        }
      }
    }

    // Hàm tìm kiếm sản phẩm
    function searchProducts() {
      const searchValue = document.getElementById('search-input').value.toLowerCase();
      const products = document.querySelectorAll('.product-item');
      let visibleCount = 0;

      products.forEach(product => {
        const productName = product.getAttribute('data-name');
        const category = product.getAttribute('data-category');
        const price = parseInt(product.getAttribute('data-price'));
        
        let matchSearch = productName.includes(searchValue);
        let showCategory = currentCategory === 'all' || category === currentCategory;
        let showPrice = true;

        // Áp dụng bộ lọc giá
        const priceFilter = currentPriceFilter;
        if (priceFilter === 'under20') {
          showPrice = price < 20000;
        } else if (priceFilter === '20to30') {
          showPrice = price >= 20000 && price <= 30000;
        } else if (priceFilter === 'above30') {
          showPrice = price > 30000;
        }

        if (matchSearch && showCategory && showPrice) {
          product.style.display = 'block';
          visibleCount++;
        } else {
          product.style.display = 'none';
        }
      });

      // Hiển thị thông báo nếu không có sản phẩm
      const grid = document.getElementById('product-grid');
      let noProductMsg = document.querySelector('.no-products');
      
      if (visibleCount === 0) {
        if (!noProductMsg) {
          noProductMsg = document.createElement('div');
          noProductMsg.className = 'no-products';
          noProductMsg.textContent = 'Không tìm thấy sản phẩm "' + document.getElementById('search-input').value + '"';
          grid.appendChild(noProductMsg);
        }
      } else {
        if (noProductMsg) {
          noProductMsg.remove();
        }
      }
    }

    // Hàm thêm vào giỏ hàng
    function addToCart(name, price, img) {
      let cart = JSON.parse(localStorage.getItem("cart")) || [];
      let existing = cart.find(item => item.name === name);

      if (existing) {
        existing.quantity += 1;
      } else {
        cart.push({ name, price, img, quantity: 1 });
      }

      localStorage.setItem("cart", JSON.stringify(cart));
      alert("✅ Đã thêm " + name + " vào giỏ hàng!");
    }
  </script>
</body>
</html>

