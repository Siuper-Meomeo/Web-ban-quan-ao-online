<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $caption = trim($_POST['caption']);
    $target_dir = "../assets/uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = "assets/uploads/" . time() . "_" . $image_name;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "jpeg", "png", "gif"];

    if (in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $target_file)) {
            $sql = "INSERT INTO outfits (user_id, image, caption) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $user_id, $target_file, $caption);
            $stmt->execute();

            $_SESSION['alert'] = [
                'type' => 'success',
                'message' => '🎉 Ảnh đã được đăng thành công!'
            ];
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'message' => '❌ Không thể upload ảnh. Hãy thử lại.'
            ];
        }
    } else {
        $_SESSION['alert'] = [
            'type' => 'warning',
            'message' => '⚠️ Định dạng ảnh không hợp lệ (chỉ jpg, jpeg, png, gif).'
        ];
    }

    header("Location: ../pages/customer.php");
    exit();
} else {
    $_SESSION['alert'] = [
        'type' => 'info',
        'message' => '📌 Bạn chưa đăng nhập hoặc không gửi đúng phương thức.'
    ];
    header("Location: ../pages/customer.php");
    exit();
}
?>