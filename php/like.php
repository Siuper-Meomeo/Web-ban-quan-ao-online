<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập để thích bài viết.']);
    exit;
}

$user_id = $_SESSION['user_id'];
$outfit_id = isset($_POST['outfit_id']) ? (int)$_POST['outfit_id'] : 0;

if ($outfit_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'ID bài viết không hợp lệ.']);
    exit;
}

// Kiểm tra đã thích chưa
$check_sql = "SELECT * FROM likes WHERE user_id = ? AND outfit_id = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("ii", $user_id, $outfit_id);
$stmt->execute();
$check_result = $stmt->get_result();

if ($check_result->num_rows > 0) {
    // Nếu đã thích → bỏ thích
    $delete_sql = "DELETE FROM likes WHERE user_id = ? AND outfit_id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("ii", $user_id, $outfit_id);
    $stmt->execute();
    $liked = false;
} else {
    // Nếu chưa thích → thêm mới
    $insert_sql = "INSERT INTO likes (user_id, outfit_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ii", $user_id, $outfit_id);
    $stmt->execute();
    $liked = true;
}

// Trả về tổng số lượt thích
$count_sql = "SELECT COUNT(*) AS like_count FROM likes WHERE outfit_id = ?";
$stmt = $conn->prepare($count_sql);
$stmt->bind_param("i", $outfit_id);
$stmt->execute();
$count_result = $stmt->get_result()->fetch_assoc();
$like_count = $count_result['like_count'];

file_put_contents('voucher_debug.txt', "Like: $like_count, Outfit ID: $outfit_id\n", FILE_APPEND);


echo json_encode([
    'success' => true,
    'like_count' => $like_count,
    'liked' => $liked
]);
?>