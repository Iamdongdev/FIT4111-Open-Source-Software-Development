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

// lấy lỗi và giá trị cũ
$errors = $errors ?? ($_SESSION['errors'] ?? []);
$old = $old ?? ($_SESSION['old'] ?? []);
unset($_SESSION['errors'], $_SESSION['old']);
?>
<div class="container mt-5" style="max-width:480px;">
    <h2 class="mb-4">Đăng Ký Tài Khoản</h2>

    <?php if (!empty($errors) && isset($errors['global'])): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($errors['global']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); ?></div>
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form method="post" action="<?= BASE_URL ?>/handle/register_process.php">
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
            <label for="phone" class="form-label">Số điện thoại</label>
            <input id="phone" name="phone" type="tel" pattern="[0-9]{10}"
                class="form-control <?php echo !empty($errors['phone']) ? 'is-invalid' : ''; ?>"
                value="<?php echo isset($old['phone']) ? htmlspecialchars($old['phone']) : ''; ?>" required>
            <?php if (!empty($errors['phone'])): ?>
            <div class="invalid-feedback"><?php echo htmlspecialchars($errors['phone']); ?></div>
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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control <?php echo !empty($errors['password_confirmation']) ? 'is-invalid' : ''; ?>" required>
            <?php if (!empty($errors['password_confirmation'])): ?>
            <div class="invalid-feedback"><?php echo htmlspecialchars($errors['password_confirmation']); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="form-check-label" for="terms">Tôi đồng ý với điều khoản sử dụng</label>
        </div>

        <div class="d-grid">
            <button type="submit" name="register" class="btn btn-primary">Đăng Ký</button>
        </div>

        <div class="mt-3 text-center">
            Đã có tài khoản? <a href="<?= BASE_URL ?>/views/client/login.php">Đăng Nhập</a>
        </div>
    </form>
</div>

<?php
include __DIR__ . '/../../views/layout/footer.php';
?>