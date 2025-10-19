<?php
session_start();
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

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">

  <?php include 'header.php'; ?>
  <!-- Banner -->
  <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../assets/img/UI/banner.jpg" class="d-block w-100" alt="Fashion banner">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-5 fw-bold">Khám phá phong cách của bạn</h1>
          <p class="lead">Cập nhật xu hướng thời trang nữ mới nhất.</p>
          <a href="#trends" class="btn btn-pink">Xem xu hướng</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Trends Section -->
  <section class="py-5 bg-light" id="trends">
    <div class="container">
      <h2 class="section-title">Xu hướng hiện tại</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="bg-white p-4 rounded text-center feature-box h-100">
            <img src="../assets/img/UI/phongcachhe.jpeg" class="img-fluid rounded mb-3" alt="Trend">
            <h5>Phong cách Hè 2024</h5>
            <p>Đồ linen nhẹ nhàng, tone màu pastel dẫn đầu mùa hè năm nay.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-white p-4 rounded text-center feature-box h-100">
            <img src="../assets/img/UI/mixihoanhi.jpeg" class="img-fluid rounded mb-3" alt="Trend">
            <h5>Đầm maxi hoa nhí</h5>
            <p>Trẻ trung, nữ tính và thoải mái cho mọi dịp đi chơi.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-white p-4 rounded text-center feature-box h-100">
            <img src="../assets/img/UI/setbobasic.jpeg" class="img-fluid rounded mb-3" alt="Trend">
            <h5>Set đồ basic</h5>
            <p>Áo thun - quần jean, style đơn giản chưa bao giờ lỗi thời.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Góc phối đồ Section -->
  <section class="py-5" id="phoi-do">
    <div class="container">
      <h2 class="section-title">Góc phối đồ</h2>
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="../assets/img/UI/gocphoido.jpg" class="img-fluid rounded" alt="Gợi ý phối đồ">
        </div>
        <div class="col-md-6">
          <h4 class="mb-3">Bạn chưa biết mặc gì hôm nay?</h4>
          <p>Góc phối đồ là nơi bạn tìm thấy cảm hứng để <strong>mix&match</strong> quần áo theo từng dịp, phong cách và
            xu hướng mới nhất.</p>
          <ul class="list-unstyled">
            <li class="mb-2">
              <i class="bi bi-stars text-pink me-2"></i>
              Tự tin thể hiện cá tính, chia sẻ cách phối đồ của riêng bạn và trở thành <strong>fashion icon</strong>
              trong cộng đồng!
            </li>
            <li class="mb-2">
              <i class="bi bi-camera text-pink me-2"></i>
              Mỗi bức ảnh – một dấu ấn phong cách, càng nhiều lượt thích, bạn càng có cơ hội nhận <strong>voucher mua
                sắm cực hấp dẫn</strong>!
            </li>
            <li class="mb-2">
              <i class="bi bi-eye text-pink me-2"></i>
              Khám phá hàng trăm ý tưởng phối đồ thực tế từ người dùng thật – <em>chạm là muốn mặc, xem là muốn
                thử!</em>
            </li>
            <li class="mb-2">
              <i class="bi bi-fire text-pink me-2"></i>
              Hãy là người truyền cảm hứng thời trang cho người khác, bắt đầu bằng <strong>một bức ảnh của bạn hôm
                nay</strong>!
            </li>
          </ul>
          <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="../pages/formLogin.php" class="btn btn-pink">Khám phá ngay</a>
          <?php else: ?>
            <a href="../pages/community.php" class="btn btn-pink">Khám phá ngay</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="py-5 bg-light" id="contact">
    <div class="container">
      <h2 class="section-title">Liên hệ</h2>
      <div class="row text-center g-4">
        <div class="col-md-4">
          <div class="bg-white p-4 rounded contact-box h-100">
            <i class="bi bi-telephone-fill"></i>
            <p>Hotline: 0123 456 789</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-white p-4 rounded contact-box h-100">
            <i class="bi bi-envelope-fill"></i>
            <p>Email: support@pinkfashion.vn</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="bg-white p-4 rounded contact-box h-100">
            <i class="bi bi-chat-dots-fill"></i>
            <p>Zalo CSKH: 0123 456 789</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
</body>

</html>