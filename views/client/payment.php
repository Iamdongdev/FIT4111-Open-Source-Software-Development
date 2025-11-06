<?php
require_once __DIR__ . '/../../functions/config.php';
require_once __DIR__ . '/../../functions/course.php';

$courseId = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
$course = getCourseById($courseId);
if (!$course) {
    echo '<p>Không tìm thấy khóa học.</p>';
    exit;
}

// Tính giá sau khuyến mãi
$price = $course['discount_price'] ? $course['discount_price'] : $course['price'];
$priceFormatted = number_format($price, 0, ',', '.') . 'đ';

// Thông tin tài khoản nhận tiền
$accountNo = '2825699999'; // Số tài khoản nhận tiền
$accountName = 'DUONG NGOC DONG'; // Tên chủ tài khoản
$bankCode = 'TCB'; // Mã ngân hàng (TECHCOMBANK)

// Tạo nội dung chuyển khoản
// Lấy số điện thoại user
session_start();
$userPhone = '';
if (isset($_SESSION['user_id'])) {
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT phone FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $userPhone = $row['phone'];
    }
    mysqli_close($conn);
}
// Bỏ số 0 đầu nếu có
if (substr($userPhone, 0, 1) === '0') {
    $userPhone = substr($userPhone, 1);
}
$description = 'Kh'. $userPhone . ' ' . $courseId;

// Tạo link API VietQR
$qrApi = "https://img.vietqr.io/image/$bankCode-$accountNo-compact2.png?amount=$price&addInfo=" . urlencode($description) . "&accountName=" . urlencode($accountName);

include __DIR__ . '/../../views/layout/header.php';
include __DIR__ . '/../../views/layout/nav.php';
?>
<div class="container py-5">
    <h2 class="mb-4">Thanh toán khóa học</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?= BASE_URL ?>/img/course/<?= htmlspecialchars($course['image']) ?>"
                class="img-fluid rounded mb-4" style="max-width:400px;">
            <h4><?= htmlspecialchars($course['title']) ?></h4>
            <p>Giá cần thanh toán: <span class="text-danger font-weight-bold"><?= $priceFormatted ?></span></p>
            <p class="mt-3">Ngân hàng: <b><?= $bankCode ?></b></p>
            <p>Số tài khoản: <b><?= $accountNo ?></b></p>
            <p>Chủ tài khoản: <b><?= $accountName ?></b></p>
            <p>Nội dung chuyển khoản: <b><?= htmlspecialchars($description) ?></b></p>
        </div>
        <div class="col-md-6">

            <img src="<?= $qrApi ?>" alt="QR Thanh toán VietQR" style="max-width:400px;">

        </div>
    </div>
</div>
<?php include __DIR__ . '/../../views/layout/footer.php'; ?>