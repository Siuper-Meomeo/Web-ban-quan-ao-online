<?php
include '../php/config.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Áo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
<?php include 'header.php'; ?>
<div class="container py-5">
  <h2 class="text-center mb-4">Sản Phẩm Mới Nhất</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="../assets/img/Ao/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
            <p class="card-text text-muted"><?= number_format($row['price']) ?> đ</p>
            <p class="card-text"><?= htmlspecialchars(mb_substr($row['description'], 0, 50)) ?>...</p>
            <a href="#" class="btn btn-pink mt-auto">Xem Chi Tiết</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>

  </div>
</div>

<?php
mysqli_close($conn);
?>

<?php include 'footer.php'; ?>d
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>