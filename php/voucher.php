<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    exit("Chưa đăng nhập");
}

$user_id = $_SESSION['user_id'];

// 1. Lấy tất cả các bài đăng (outfit_id) của người dùng
$sql = "SELECT id FROM outfits WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$outfits = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// 2. Với mỗi bài đăng, đếm số lượt like
foreach ($outfits as $outfit) {
    $outfit_id = $outfit['id'];

    // Đếm số lượt like của bài đăng này
    $sql = "SELECT COUNT(*) AS like_count FROM likes WHERE outfit_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $outfit_id);
    $stmt->execute();
    $like_count = $stmt->get_result()->fetch_assoc()['like_count'];

    // Kiểm tra nếu là bội số của 10 và chưa tặng voucher
    if ($like_count > 0 && $like_count % 10 == 0) {
        // Kiểm tra đã tặng voucher cho lần like_count này chưa
        $check = "SELECT COUNT(*) FROM vouchers WHERE user_id = ? AND outfit_id = ? AND discount = 10 AND code = ?";
        $voucher_code = "LIKE$like_count-O$outfit_id";
        $stmt = $conn->prepare($check);
        $stmt->bind_param("iis", $user_id, $outfit_id, $voucher_code);
        $stmt->execute();
        $exists = $stmt->get_result()->fetch_row()[0];

        if ($exists == 0) {
            // Tạo voucher
            $insert = "INSERT INTO vouchers (user_id, outfit_id, code, discount, created_at) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($insert);
            $discount = 10; 
            $stmt->bind_param("iisi", $user_id, $outfit_id, $voucher_code, $discount);
            $stmt->execute();
        }
    }
}
?>
