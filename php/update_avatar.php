<?php
session_start();
include 'config.php';

if (isset($_SESSION['user_id']) && isset($_FILES['avatar'])) {
  $user_id = $_SESSION['user_id'];
  $file = $_FILES['avatar'];

  if ($file['error'] === 0 && $file['type'] !== '') {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = 'assets/img/avatar/' . $user_id . '.' . $ext;
    move_uploaded_file($file['tmp_name'], '../' . $fileName);

    $stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    $stmt->bind_param("si", $fileName, $user_id);
    $stmt->execute();

    $_SESSION['avatar'] = $fileName;
  }
}

header('Location: ../pages/customer.php');
exit;
