<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['fullname'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['avatar'] = $user['avatar'];

            header("Location: ../pages/index.php");
            exit();
        } else {
            $_SESSION['alert'] = [
                "type" => "danger",
                "message" => "❌ Sai mật khẩu!"
            ];
        }
    } else {
        $_SESSION['alert'] = [
            "type" => "warning",
            "message" => "⚠️ Email không tồn tại!"
        ];
    }

    // Điều hướng trở lại login
    header("Location: ../pages/formlogin.php");
    exit();
}
?>
