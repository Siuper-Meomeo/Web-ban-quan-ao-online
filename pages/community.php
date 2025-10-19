<?php
session_start();
include '../php/config.php';

$user_id = $_SESSION['user_id'] ?? null;
$sql = "
  SELECT o.*, u.fullname AS author_name, 
         (SELECT COUNT(*) FROM likes WHERE likes.outfit_id = o.id) AS like_count,
         (SELECT COUNT(*) FROM likes WHERE likes.outfit_id = o.id AND likes.user_id = ?) AS liked_by_user
  FROM outfits o
  JOIN users u ON o.user_id = u.id
  ORDER BY o.created_at DESC
";

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
    <title>Cộng đồng phối đồ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        .outfit-card img {
            height: 250px;
            object-fit: cover;
        }

        .btn-like.liked {
            background-color: #ec407a;
            color: white;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">Cộng đồng phối đồ</h2>
        <div class="row g-4">
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card outfit-card h-100 shadow-sm">
                            <img src="../<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="Outfit">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="card-text">Đăng bởi: <strong><?= htmlspecialchars($row['author_name']) ?></strong></p>
                                <p class="card-text text-muted" style="font-size: 0.9em;">Ngày đăng:
                                    <?= date('d/m/Y', strtotime($row['created_at'])) ?>
                                </p>
                                <p class="card-text"><?= htmlspecialchars($row['caption']) ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <button type="button"
                                        class="btn btn-pink btn-like <?= $row['liked_by_user'] ? 'liked' : '' ?>"
                                        data-outfit-id="<?= $row['id'] ?>">
                                        <?= $row['liked_by_user'] ? '❤️ Đã thích' : '🤍 Thích' ?>
                                    </button>
                                    <p class="card-text like-count mb-0">Lượt thích: <?= $row['like_count'] ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có dữ liệu để hiển thị.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const likeButtons = document.querySelectorAll('.btn-like');

            likeButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const outfitId = this.getAttribute('data-outfit-id');
                    const card = this.closest('.card-body');
                    const likeCountElement = card.querySelector('.like-count');
                    const btn = this;

                    fetch('../php/like.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'outfit_id=' + outfitId
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                likeCountElement.textContent = 'Lượt thích: ' + data.like_count;
                                if (data.liked) {
                                    btn.classList.add('liked');
                                    btn.textContent = '❤️ Đã thích';
                                } else {
                                    btn.classList.remove('liked');
                                    btn.textContent = '🤍 Thích';
                                }
                            } else {
                                alert(data.message);
                            }
                        });

                });
            });
        });
    </script>
</body>
</html>