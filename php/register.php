<?php
include 'config.php';

// 2. Lấy dữ liệu từ form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu
$phone = $_POST['phone'];

$fullname = $firstname . " " . $lastname;

// 3. Chèn dữ liệu vào bảng khachhang
$sql = "INSERT INTO users (fullname, email, phone, password)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fullname, $email, $phone, $password);


if ($stmt->execute()) {
    $success = true; 
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cửa Hàng Thời Trang Nữ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <!-- Thông báo đăng ký thành công -->
    <?php if (isset($success) && $success): ?>
  <div class="card text-white shadow p-3 mb-3 mx-auto mt-5" style="max-width: 400px; border-radius: 1rem; background-color: #f8c8dc;">
    <div class="card-body text-center">
      <h5 class="card-title"><i class="bi bi-check-circle-fill"></i> Đăng ký thành công!</h5>
      <p class="card-text">Cảm ơn bạn đã đăng ký. Hệ thống sẽ tự chuyển hướng trong vài giây...</p>
    </div>
  </div>

  <script>
    // Chuyển trang sau 3 giây
    setTimeout(function () {
      window.location.href = '../pages/index.php';
    }, 3000);
  </script>
<?php endif; ?>
</body>