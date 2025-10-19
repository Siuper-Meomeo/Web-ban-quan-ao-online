<?php
include 'config.php';

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

    // Lấy thông tin người dùng
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Lấy danh sách bài đăng
    $stmt2 = $conn->prepare("SELECT * FROM outfits WHERE user_id = ? ORDER BY created_at DESC");
    $stmt2->bind_param("i", $user_id);
    $stmt2->execute();
    $posts = $stmt2->get_result();
} else {
    echo "Không tìm thấy người dùng.";
    exit;
}
?>

<h2>Trang cá nhân của <?php echo htmlspecialchars($user['username']); ?></h2>

<?php while ($post = $posts->fetch_assoc()): ?>
    <div>
        <img src="../<?php echo $post['image']; ?>" alt="Post Image" width="200">
        <p><?php echo $post['caption']; ?></p>
        <small><?php echo $post['created_at']; ?></small>
    </div>
<?php endwhile; ?>
