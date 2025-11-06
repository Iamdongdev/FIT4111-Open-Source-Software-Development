<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none"
                data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
                <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Subjects</h5>
                <i class="fa fa-angle-down text-primary"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                <div class="navbar-nav w-100">
                    <a href="" class="nav-item nav-link">Web Design</a>
                    <a href="" class="nav-item nav-link">Apps Design</a>
                    <a href="" class="nav-item nav-link">Marketing</a>
                    <a href="" class="nav-item nav-link">Research</a>
                    <a href="" class="nav-item nav-link">SEO</a>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="<?= BASE_URL ?>/router.php?page=home" class="nav-item nav-link active">Home</a>
                        <a href="<?= BASE_URL ?>/router.php?page=about" class="nav-item nav-link">About</a>
                        <a href="<?= BASE_URL ?>/router.php?page=course" class="nav-item nav-link">Courses</a>
                        <a href="<?= BASE_URL ?>/router.php?page=teacher" class="nav-item nav-link">Teachers</a>
                        <a href="<?= BASE_URL ?>/router.php?page=blog" class="nav-item nav-link">Blog</a>
                        <a href="<?= BASE_URL ?>/router.php?page=contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block"
                        href="<?= BASE_URL ?>/views/client/login.php">Đăng Nhập</a>
                    <?php else: ?>
                    <div class="nav-item dropdown ml-auto">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://autogiare.com/assets/images/profile/user-1.jpg" alt="User Avatar"
                                class="rounded-circle" style="width: 40px; height: 40px;">
                            <span class="ml-2 d-none d-lg-block"><?= htmlspecialchars($_SESSION['email']) ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://autogiare.com/assets/images/profile/user-1.jpg" alt="User Avatar"
                                        class="rounded-circle" style="width: 60px; height: 60px;">
                                    <div class="ml-3">
                                        <h6 class="mb-1"><?= htmlspecialchars($_SESSION['email']) ?></h6>
                                        <p class="text-muted mb-0">Role: <?= htmlspecialchars($_SESSION['role']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= BASE_URL ?>/views/client/profile.php">
                                <i class="fas fa-user mr-2"></i>Thông tin cá nhân
                            </a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>/views/client/profile.php">
                                <i class="fas fa-key mr-2"></i>Đổi mật khẩu
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= BASE_URL ?>/handle/logout.php">
                                <i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->