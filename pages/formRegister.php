<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng ký</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
  <!-- Đăng ký tài khoản -->
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="container my-5" style="max-width: 550px; background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
      <h2 class="text-center mb-4" style="color: #B32962;">Đăng ký tài khoản</h2>
      <form action="../php/register.php" method="POST">
        <div class="row mb-3">
          <div class="col">
            <label for="firstname" class="form-label">Họ</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
          </div>
          <div class="col">
            <label for="lastname" class="form-label">Tên</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-pink px-5">Đăng ký</button>
        </div>
      </form>
    </div>
  </div

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
