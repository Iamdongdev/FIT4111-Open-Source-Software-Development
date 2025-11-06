<?php
include __DIR__ . '/../../functions/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . '/../../views/layout/header.php';
include __DIR__ . '/../../views/layout/nav.php';

// tạo CSRF token nếu chưa có
if (empty($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}

// lấy lỗi và giá trị cũ (controller có thể set $errors/$old hoặc dùng session flash)
$errors = $errors ?? ($_SESSION['errors'] ?? []);
$old = $old ?? ($_SESSION['old'] ?? []);
// xóa flash nếu dùng session
unset($_SESSION['errors'], $_SESSION['old']);
?>
<div class="container mt-5" style="max-width:480px;">
    <h2 class="mb-4">Đăng nhập</h2>

    <?php if (!empty($errors) && isset($errors['global'])): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($errors['global']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); ?></div>
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form method="post" action="<?= BASE_URL ?>/handle/login_process.php">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email"
                class="form-control <?php echo !empty($errors['email']) ? 'is-invalid' : ''; ?>"
                value="<?php echo isset($old['email']) ? htmlspecialchars($old['email']) : ''; ?>" required autofocus>
            <?php if (!empty($errors['email'])): ?>
            <div class="invalid-feedback"><?php echo htmlspecialchars($errors['email']); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" type="password"
                class="form-control <?php echo !empty($errors['password']) ? 'is-invalid' : ''; ?>" required>
            <?php if (!empty($errors['password'])): ?>
            <div class="invalid-feedback"><?php echo htmlspecialchars($errors['password']); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember"
                <?php echo !empty($old['remember']) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
        </div>

        <div class="d-grid">
            <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
        </div>

        <div class="mt-3">
            <a href="<?php echo htmlspecialchars($config['base_url'] ?? '/') ?>password/forgot">Quên mật khẩu?</a>
            &nbsp;|&nbsp;
            <a href="<?= BASE_URL ?>/views/client/register.php">Đăng ký</a>
        </div>
    </form>
</div>

<!-- Modal Thông báo đăng nhập thành công -->
<?php if (isset($_SESSION['redirect_after_login'])): ?>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-check-circle text-success" style="font-size: 48px;"></i>
                    <p class="mt-3">Đăng nhập thành công!</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="okButton">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();

    document.getElementById('okButton').addEventListener('click', function() {
        window.location.href = '<?= BASE_URL ?>/index.php';
    });
});
</script>
<?php 
    unset($_SESSION['redirect_after_login']);
endif; 
?>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>