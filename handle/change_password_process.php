<?php
session_start();
require_once __DIR__ . '/../functions/config.php';
require_once __DIR__ . '/../functions/auth.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . '/views/client/login.php');
    exit;
}

// Kiểm tra CSRF token
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
    $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['errors'] = ['global' => 'CSRF token không hợp lệ'];
    header('Location: ' . BASE_URL . '/views/client/profile.php');
    exit;
}

// Lấy dữ liệu từ form
$currentPassword = $_POST['current_password'] ?? '';
$newPassword = $_POST['new_password'] ?? '';
$confirmPassword = $_POST['new_password_confirmation'] ?? '';

// Thực hiện đổi mật khẩu
$result = changePassword(
    $_SESSION['user_id'],
    $currentPassword,
    $newPassword,
    $confirmPassword
);

if ($result['success']) {
    // Tạo CSRF token mới
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    
    $_SESSION['success'] = $result['message'];
    header('Location: ' . BASE_URL . '/views/client/profile.php');
    exit;
} else {
    $_SESSION['errors'] = $result['errors'];
    header('Location: ' . BASE_URL . '/views/client/profile.php');
    exit;
}