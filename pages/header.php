<?php
include '../php/config.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thời trang Pink</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
  <!-- Navbar-->
  <nav class="bg-white shadow border-bottom">
    <div class="container py-2 d-flex align-items-center justify-content-between flex-wrap">
      <div class="d-flex align-items-center">
        <a class="navbar-brand fw-bold text-pink" href="#">PinkFashion</a>
      </div>

      <form class="d-flex flex-grow-1 mx-3" role="search">
        <input class="form-control rounded-start-pill" type="search" placeholder="Tìm kiếm..." aria-label="Search">
        <button class="btn btn-pink rounded-end-pill px-3" type="submit">Tìm kiếm</button>
      </form>

      <div class="d-flex align-items-center gap-3 mt-2 mt-lg-0">
        <a href="../pages/index.php" class="text-pink text-decoration-none"><i class="bi bi-house-door-fill"></i> Trang
          chủ</a>
        <?php if (!isset($_SESSION['user_id'])): ?>
          <a href="../pages/formLogin.php" class="text-pink text-decoration-none"><i class="bi bi-person-circle"></i> Tài
            khoản</a>
        <?php else: ?>
          <a href="../pages/customer.php" class="text-pink text-decoration-none"><i class="bi bi-person-circle"></i> Tài
            khoản</a>
        <?php endif; ?>
        <a href="../pages/notifications.php" class="text-pink text-decoration-none position-relative fs-4"
          id="voucher-alert">
          <i class="bi bi-bell-fill"></i>
          <?php if (isset($_SESSION['user_id'])): ?>
            <?php
            $uid = $_SESSION['user_id'];
            $voucher_sql = "SELECT COUNT(*) AS total FROM vouchers WHERE user_id = ?";
            $stmt = $conn->prepare($voucher_sql);
            $stmt->bind_param("i", $uid);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            $voucher_count = $result['total'];
            ?>
            <?php if ($voucher_count > 0): ?>
              <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $voucher_count ?></span>
            <?php endif; ?>
          <?php endif; ?>
        </a>

      </div>
    </div>

    <!-- Danh mục sản phẩm -->
    <div class="bg-light border-top">
      <div class="container d-flex justify-content-center flex-wrap py-2 gap-4">
        <a href="product.php" class="text-pink text-decoration-none">Áo</a>
        <a href="#" class="text-pink text-decoration-none">Quần</a>
        <a href="#" class="text-pink text-decoration-none">Chân váy</a>
        <a href="#" class="text-pink text-decoration-none">Đầm</a>
        <a href="#" class="text-pink text-decoration-none">Áo khoác</a>
        <a href="#" class="text-pink text-decoration-none">Phụ kiện</a>
      </div>
    </div>
  </nav>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>