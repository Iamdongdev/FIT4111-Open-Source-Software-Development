<?php
session_start();
require_once __DIR__ . '/../functions/config.php';
require_once __DIR__ . '/../functions/auth.php';

// Kiểm tra CSRF token
if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
    $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['errors'] = ['global' => 'CSRF token không hợp lệ'];
    header('Location: ' . BASE_URL . '/views/client/register.php');
    exit;
}

$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$password_confirmation = $_POST['password_confirmation'] ?? '';

// Lưu giá trị cũ
$_SESSION['old'] = [
    'email' => $email,
    'phone' => $phone
];

// Thực hiện đăng ký
$result = register($email, $phone, $password, $password_confirmation);

if ($result['success']) {
    $_SESSION['success'] = 'Đăng ký thành công! Vui lòng đăng nhập.';
    header('Location: ' . BASE_URL . '/views/client/login.php');
    exit;
} else {
    $_SESSION['errors'] = $result['errors'] ?? ['global' => $result['message']];
    header('Location: ' . BASE_URL . '/views/client/register.php');
    exit;
}