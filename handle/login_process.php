<?php
session_start();
require_once __DIR__ . '/../functions/config.php';
require_once __DIR__ . '/../functions/auth.php';

// Kiểm tra CSRF token
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
    $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['errors'] = ['global' => 'CSRF token không hợp lệ'];
    header('Location: ' . BASE_URL . '/views/client/login.php');
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Lưu giá trị cũ
$_SESSION['old'] = [
    'email' => $email,
    'remember' => isset($_POST['remember'])
];

// Thực hiện đăng nhập
$result = login($email, $password);

if ($result['success']) {
    $_SESSION['success'] = 'Đăng nhập thành công!';
    $_SESSION['redirect_after_login'] = true; // Thêm flag để kiểm tra redirect
    header('Location: ' . BASE_URL . '/views/client/login.php');
    exit;
} else {
    $_SESSION['errors'] = ['global' => $result['message']];
    header('Location: ' . BASE_URL . '/views/client/login.php');
    exit;
}