<?php
session_start();
include 'config.php';

if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';

  $stmt = $conn->prepare("UPDATE users SET fullname = ?, email = ?, phone = ? WHERE id = ?");
  $stmt->bind_param("sssi", $name, $email, $phone, $id);
  $stmt->execute();

  $_SESSION['name'] = $name; 
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
}

header("Location: ../pages/customer.php");
exit;

