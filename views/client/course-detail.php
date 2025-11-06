<?php
require_once __DIR__ . '/../../functions/config.php';
require_once __DIR__ . '/../../functions/course.php';

// Get course ID from URL
$courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Get course details
$course = getCourseById($courseId);

// Redirect if course not found
if (!$course) {
    $_SESSION['error'] = 'Không tìm thấy khóa học';
    header('Location: ' . BASE_URL . '/index.php');
    exit;
}

include __DIR__ . '/../../views/layout/header.php';
include __DIR__ . '/../../views/layout/nav.php';
?>
<!-- Header Start -->
<div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Course Details</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Course Details</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Course Detail Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <img class="img-fluid rounded w-100 mb-5"
                    src="<?= BASE_URL ?>/img/course/<?= htmlspecialchars($course['image']) ?>" alt="Course Image">
                <div class="d-flex">
                    <p class="mr-3"><i class="fa fa-users text-primary mr-2"></i><?= $course['total_students'] ?>
                        Students</p>
                    <p class="mr-3"><i
                            class="far fa-clock text-primary mr-2"></i><?= htmlspecialchars($course['duration']) ?></p>
                    <p class="mr-3">
                        <i class="fa fa-star text-primary mr-2"></i><?= number_format($course['rating'], 1) ?>
                        <small>(<?= $course['total_ratings'] ?>)</small>
                    </p>
                </div>
                <h1 class="mb-4"><?= htmlspecialchars($course['title']) ?></h1>
                <p><?= nl2br(htmlspecialchars($course['description'])) ?></p>

                <!-- Course Curriculum -->
                <h3 class="mb-4">Chương Trình Giảng Dạy</h3>
                <div class="bg-secondary rounded p-4 mb-5">
                    <ul class="list-group list-group-flush rounded">
                        <?php foreach ($course['curriculum']['sections'] as $index => $section): ?>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span><?= ($index + 1) ?>. <?= htmlspecialchars($section['title']) ?></span>
                                <span><?= $section['lectures'] ?> lectures</span>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Specifications -->
                <h3 class="mb-4">Thông Số</h3>
                <div class="bg-secondary rounded p-4 mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush rounded">
                                <?php
                                $half = ceil(count($course['specifications']['features']) / 2);
                                $firstHalf = array_slice($course['specifications']['features'], 0, $half);
                                foreach ($firstHalf as $spec):
                                ?>
                                <li class="list-group-item">
                                    <i class="<?= $spec['icon'] ?> text-primary mr-2"></i>
                                    <?= htmlspecialchars($spec['text']) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush rounded">
                                <?php
                                $secondHalf = array_slice($course['specifications']['features'], $half);
                                foreach ($secondHalf as $spec):
                                ?>
                                <li class="list-group-item">
                                    <i class="<?= $spec['icon'] ?> text-primary mr-2"></i>
                                    <?= htmlspecialchars($spec['text']) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Comment List -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">3 Comments</h3>
                    <div class="media mb-4">
                        <img src="<?= BASE_URL ?>/img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                            style="width: 45px;">
                        <div class="media-body">
                            <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at.
                                Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam
                                consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                            <button class="btn btn-sm btn-secondary">Reply</button>
                        </div>
                    </div>
                    <div class="media mb-4">
                        <img src="<?= BASE_URL ?>/img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                            style="width: 45px;">
                        <div class="media-body">
                            <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at.
                                Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam
                                consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                            <button class="btn btn-sm btn-secondary">Reply</button>
                            <div class="media mt-4">
                                <img src="<?= BASE_URL ?>/img/user.jpg" alt="Image"
                                    class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum
                                        et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                        Gubergren clita aliquyam consetetur, at tempor amet ipsum diam tempor at
                                        sit.</p>
                                    <button class="btn btn-sm btn-secondary">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment Form -->
                <div class="bg-secondary rounded p-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h3>
                    <form>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control border-0" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control border-0" id="email">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control border-0" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control border-0"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave Comment"
                                class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold">
                        </div>
                    </form>
                </div>
            </div>
            <!-- Detail End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Price Section -->
                <div class="bg-secondary rounded text-center p-4 mb-5">
                    <h2><?= number_format($course['price'], 0, ',', '.') ?>đ</h2>
                    <?php if ($course['discount_price']): ?>
                    <p><?= round((1 - $course['discount_price'] / $course['price']) * 100) ?>% Off</p>
                    <h1 class="text-primary"><?= number_format($course['discount_price'], 0, ',', '.') ?>đ</h1>
                    <?php endif; ?>
                    <a href="<?= BASE_URL ?>/router.php?page=payment&course_id=<?= $course['id'] ?>"
                        class="btn btn-primary py-3 w-100 mb-3">Đăng ký ngay! </a>
                    <a href="" class="btn btn-light py-3 w-100">Học thử</a>
                </div>

                <!-- Instructor -->
                <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
                    <img src="<?= BASE_URL ?>/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3"
                        style="width: 100px;">
                    <h3 class="text-primary mb-3">John Doe</h3>
                    <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit
                        no ut est ipsum erat kasd amet elitr</p>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Web Design</a>
                            <span class="badge badge-primary badge-pill">150</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Web Development</a>
                            <span class="badge badge-primary badge-pill">131</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Online Marketing</a>
                            <span class="badge badge-primary badge-pill">78</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Keyword Research</a>
                            <span class="badge badge-primary badge-pill">56</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Email Marketing</a>
                            <span class="badge badge-primary badge-pill">98</span>
                        </li>
                    </ul>
                </div>

                <!-- Top Course Start -->
                <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Top Courses</h3>
                <div class="row mb-3">
                    <div class="col-12 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="<?= BASE_URL ?>/img/course-1.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25 Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">99đ</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
<!-- Course Detail End -->
<?php include __DIR__ . '/../../views/layout/footer.php'; ?>