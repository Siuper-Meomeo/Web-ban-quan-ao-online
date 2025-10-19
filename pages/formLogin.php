<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <!-- Đăng nhập tài khoản -->
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="container" style="max-width: 500px; background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
      <h2 class="text-center mb-4" style="color: #B32962;">Đăng nhập</h2>
      <form action="../php/login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-4">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <?php if (isset($_SESSION['alert'])): ?>
          <div class="container mt-3">
            <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['alert']['message']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        <?php unset($_SESSION['alert']); endif; ?>
        <div class="d-grid">
          <button type="submit" class="btn btn-pink btn-lg">ĐĂNG NHẬP</button>
        </div>
      </form>
      <div class="text-center mt-4">
        <a href="#" class="text-muted d-block mb-1">Quên mật khẩu?</a>
        <a href="../pages/formRegister.php" style="color: #B32962;">Đăng ký</a>
      </div>
    </div>
  </div>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>