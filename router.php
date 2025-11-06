<?php
// File điều hướng rút ngắn đường dẫn các trang
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'about':
        require __DIR__ . '/views/client/about.php';
        break;
    case 'course':
        require __DIR__ . '/views/client/course.php';
        break;
    case 'course-detail':
        require __DIR__ . '/views/client/course-detail.php';
        break;
    case 'teacher':
        require __DIR__ . '/views/client/teacher.php';
        break;
    case 'blog':
        require __DIR__ . '/views/client/blog.php';
        break;
    case 'contact':
        require __DIR__ . '/views/client/contact.php';
        break;
    case 'register':
        require __DIR__ . '/views/client/register.php';
        break;
    case 'login':
        require __DIR__ . '/views/client/login.php';
        break;
    case 'profile':
        require __DIR__ . '/views/client/profile.php';
        break;
    case 'payment':
        require __DIR__ . '/views/client/payment.php';
        break;
    case 'home':
    default:
        require __DIR__ . '/views/index.php';
        break;
}
