<?php
include __DIR__ . '/../../functions/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . '/views/client/login.php');
    exit;
}

include __DIR__ . '/../../views/layout/header.php';
include __DIR__ . '/../../views/layout/nav.php';

// Lấy thông tin user
$conn = getDbConnection();
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
mysqli_close($conn);

// Lấy thông báo lỗi và success
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['errors'], $_SESSION['success']);
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://autogiare.com/assets/images/profile/user-1.jpg" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3"><?= htmlspecialchars($user['email']) ?></h5>
                    <p class="text-muted mb-1">Vai trò: <?= htmlspecialchars($user['role']) ?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Thông tin cá nhân -->
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= htmlspecialchars($user['email']) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Số điện thoại</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= htmlspecialchars($user['phone']) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Ngày tham gia</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= htmlspecialchars($user['created_at']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form đổi mật khẩu -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Đổi mật khẩu</h5>

                    <?php if (!empty($success)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($errors['global'])): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($errors['global']) ?></div>
                    <?php endif; ?>

                    <form action="<?= BASE_URL ?>/handle/change_password_process.php" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                            <input type="password"
                                class="form-control <?= !empty($errors['current_password']) ? 'is-invalid' : '' ?>"
                                id="current_password" name="current_password" required>
                            <?php if (!empty($errors['current_password'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($errors['current_password']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Mật khẩu mới</label>
                            <input type="password"
                                class="form-control <?= !empty($errors['new_password']) ? 'is-invalid' : '' ?>"
                                id="new_password" name="new_password" required>
                            <?php if (!empty($errors['new_password'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($errors['new_password']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password"
                                class="form-control <?= !empty($errors['new_password_confirmation']) ? 'is-invalid' : '' ?>"
                                id="new_password_confirmation" name="new_password_confirmation" required>
                            <?php if (!empty($errors['new_password_confirmation'])): ?>
                            <div class="invalid-feedback"><?= htmlspecialchars($errors['new_password_confirmation']) ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>