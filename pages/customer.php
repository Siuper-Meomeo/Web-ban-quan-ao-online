<?php
session_start();
include '../php/config.php';

$outfits = [];

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM outfits WHERE user_id = ? ORDER BY created_at DESC";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $outfits = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trang cá nhân</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="../assets/css/customer.css">
</head>

<body>
  <div class="profile-page">
    <div class="container-fluid">
      <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3 sidebar text-center">
          <form action="../php/update_avatar.php" method="POST" enctype="multipart/form-data" id="avatar-form">
            <label for="avatar-upload" class="d-block position-relative" style="cursor: pointer;">
              <img src="../<?php echo $_SESSION['avatar'] ?? 'assets/img/default-avatar.png'; ?>"
                alt="Avatar khách hàng" class="img-fluid rounded-circle"
                style="width: 180px; height: 180px; object-fit: cover; cursor: pointer;"
                onclick="document.getElementById('avatarInput').click();">
              <input type="file" name="avatar" id="avatar-upload" accept="image/*" class="d-none"
                onchange="document.getElementById('avatar-form').submit();">
            </label>
          </form>
          <h5 class="mt-3 fw-bold">Tài khoản của tôi</h5>
          <div class="menu-box mt-4 p-3 rounded text-start">
            <p class="mb-2"><i class="bi bi-person-fill me-2"></i>
              <strong>Họ tên:</strong>
              <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Chưa có'; ?>
            </p>
            <p class="mb-2"><i class="bi bi-envelope-fill me-2"></i>
              <strong>Email:</strong>
              <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Chưa có'; ?>
            </p>
            <p class="mb-2"><i class="bi bi-telephone-fill me-2"></i>
              <strong>Điện thoại:</strong>
              <?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : 'Chưa có'; ?>
            </p>
            <button class="btn btn-pink w-100 mb-3" data-bs-toggle="modal" data-bs-target="#editInfoModal">
              <i class="bi bi-pencil-square me-2"></i> Chỉnh sửa thông tin
            </button>

            <a href="index.php" class="btn btn-pink w-100 mb-3">
              <i class="bi bi-house-door me-2"></i> Quay lại trang chủ
            </a>

            <a href="../php/logout.php" class="btn btn-pink w-100">
              <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
            </a>
          </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 content">
          <div class="username">Xin chào,
            <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Chưa có'; ?>!
          </div>
          <!-- Giới thiệu Góc phối đồ -->
          <p class="info-text mb-4">
            Chào mừng bạn đến với Góc phối đồ. Đây là nơi bạn có thể chia sẻ những set đồ cá tính, sáng tạo và phong
            cách riêng của mình. Đừng ngần ngại
            thể hiện gu thời trang độc đáo nhé!
          </p>

          <!-- Form đăng bài phối đồ -->
          <div class="mb-5 p-4 rounded shadow-sm" style="border: 2px solid var(--primary-dark);">
            <h5 class="mb-3" style="color: var(--text-color);">Đăng bài phối đồ mới</h5>
            <form action="../php/upload_outfit.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="caption" class="form-label">Chia sẻ cảm hứng phối đồ của bạn</label>
                <textarea class="form-control" id="caption" rows="3" name="caption" required
                  placeholder="Ví dụ: Outfit đi cà phê cuối tuần..."></textarea>
              </div>
              <div class="mb-3">
                <label for="imageUpload" class="form-label">Chọn ảnh phối đồ</label>
                <input class="form-control" type="file" id="imageUpload" name="image" accept="image/*" required>
              </div>
              <?php if (isset($_SESSION['alert'])): ?>
                <div class="container mt-3">
                  <div class="alert alert-<?= $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['alert']['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
                <?php unset($_SESSION['alert']); ?>
              <?php endif; ?>
              <button type="submit" class="btn btn-pink px-4" style="border: none;">Đăng bài</button>
            </form>
          </div>

          <!-- Bài phối đồ đã đăng -->
          <h5 class="mb-4" style="color: var(--text-color);">Bài phối đồ đã đăng</h5>
          <div class="row g-4">
            <?php if (!empty($outfits)): ?>
              <?php foreach ($outfits as $outfit): ?>
                <div class="col-md-6">
                  <div class="card shadow-sm">
                    <img src="../<?php echo htmlspecialchars($outfit['image']); ?>" class="card-img-top" alt="Outfit Image">
                    <div class="card-body">
                      <p class="card-text"><?php echo htmlspecialchars($outfit['caption']); ?></p>
                      <p class="text-muted small">Đăng ngày: <?php echo date('d/m/Y', strtotime($outfit['created_at'])); ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-12">
                <p class="text-muted">Bạn chưa đăng bài phối đồ nào.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal chỉnh sửa thông tin -->
  <div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="editInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="../php/update_info.php" method="POST" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editInfoModalLabel">Chỉnh sửa thông tin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" class="form-control" name="name" id="name"
              value="<?php echo htmlspecialchars($_SESSION['name'] ?? '') ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email"
              value="<?php echo htmlspecialchars($_SESSION['email'] ?? '') ?>">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone"
              value="<?php echo htmlspecialchars($_SESSION['phone'] ?? '') ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-pink" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-pink">Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>