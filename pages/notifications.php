<?php
include '../php/config.php';
include '../php/voucher.php';


if (!isset($_SESSION['user_id'])) {
  header('Location: formLogin.php');
  exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM vouchers WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Thông báo cho bạn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/customer.css">
  <style>
  </style>
</head>

<body>

  <?php include 'header.php'; ?>
  <div class="container py-5">
    <!-- Khung tiêu đề -->
    <div class="card mb-4 shadow border-0">
      <div class="card-body border-start border-4 border-pink">
        <h2 class="text-pink mb-0 fw-bold fs-2">🎁 Mã giảm giá của bạn</h2>
      </div>
    </div>

    <?php if (empty($data)): ?>
      <!-- Giao diện chưa có voucher -->
      <div class="card mb-5 shadow-sm text-center p-5">
        <div class="card-body">
          <h4 class="text-muted mb-3">Bạn chưa có mã giảm giá nào!</h4>
          <p>Hãy tương tác với bài viết, thích sản phẩm để nhận quà tặng đặc biệt 💝</p>
          <img src="https://cdn-icons-png.flaticon.com/512/8244/8244553.png" alt="no voucher" width="150" class="my-3">
          <a href="index.php" class="btn btn-pink bg-pink text-white mt-3">Khám phá ngay</a>
        </div>
      </div>
    <?php else: ?>

      <!-- Khung chứa hướng dẫn và danh sách mã -->
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <h5 class="text-pink mb-3">💡 Hướng dẫn sử dụng mã giảm giá</h5>
              <ul class="mb-0">
                <li>Thêm sản phẩm vào giỏ hàng</li>
                <li>Nhập mã giảm giá ở trang thanh toán</li>
                <li>Nhấn "Áp dụng" để được giảm giá ngay</li>
                <li>Mỗi mã chỉ dùng 1 lần</li>
                <li>Thời hạn: 30 ngày kể từ ngày nhận mã</li>
              </ul>
            </div>

            <div class="col-md-6" style="max-height: 300px; overflow-y: auto;">
              <?php foreach ($data as $row): ?>
                <div class="voucher-box shadow-sm mb-3">
                  <h5 class="text-pink">🎉 Mã: <strong><?= htmlspecialchars($row['code']) ?></strong></h5>
                  <p>Giảm giá: <strong><?= htmlspecialchars($row['discount']) ?>%</strong></p>
                  <p class="mb-0"><small class="text-muted">Nhận lúc:
                      <?= date('H:i d/m/Y', strtotime($row['created_at'])) ?></small></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <?php include 'footer.php'; ?>
</body>

</html>