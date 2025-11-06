<?php
require_once __DIR__ . '/../functions/config.php';
session_start();
session_destroy();
header('Location: ' . BASE_URL . '/views/client/login.php');
exit;