<?php
include __DIR__ . '/../functions/config.php';
include __DIR__ . '/../functions/course.php';
include __DIR__ . '/../views/layout/header.php';
include __DIR__ . '/../views/layout/nav.php';
?>
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#header-carousel" data-slide-to="1"></li>
            <li data-target="#header-carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="min-height: 300px;">
                <img class="position-relative w-100" src="<?= BASE_URL ?>/img/carousel-1.jpg"
                    style="min-height: 300px; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3">Trang Web Bán Khóa Học Trực Tuyến Tốt Nhất</h5>
                        <h1 class="display-3 text-white mb-md-4">Nền Giáo Dục Tốt Nhất Tại Nhà</h1>
                        <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Tìm Hiểu Thêm</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="min-height: 300px;">
                <img class="position-relative w-100" src="<?= BASE_URL ?>/img/carousel-2.jpg"
                    style="min-height: 300px; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3">Trang Web Bán Khóa Học Trực Tuyến Tốt Nhất</h5>
                        <h1 class="display-3 text-white mb-md-4">Nền Tảng Học Trực Tuyến Tốt Nhất</h1>
                        <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Tìm Hiểu Thêm</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="min-height: 300px;">
                <img class="position-relative w-100" src="<?= BASE_URL ?>/img/carousel-3.jpg"
                    style="min-height: 300px; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3">Trang Web Bán Khóa Học Trực Tuyến Tốt Nhất</h5>
                        <h1 class="display-3 text-white mb-md-4">Cách Học Mới Tại Nhà</h1>
                        <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Tìm Hiểu Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="<?= BASE_URL ?>/img/about.jpg" alt="">
            </div>
            <div class="col-lg-7">
                <div class="text-left mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
                    <h1>Phương Pháp Học Tập Sáng Tạo</h1>
                </div>
                <p>Chúng tôi tự hào mang đến phương pháp học tập sáng tạo và hiệu quả. Với đội ngũ giảng viên giàu kinh
                    nghiệm
                    cùng công nghệ hiện đại, chúng tôi cam kết mang đến trải nghiệm học tập tốt nhất cho học viên. Hệ
                    thống bài
                    giảng được thiết kế khoa học, phù hợp với nhiều đối tượng học viên khác nhau. Bạn sẽ được trải
                    nghiệm
                    phương pháp học tập mới mẻ, hiệu quả và linh hoạt theo thời gian biểu của riêng mình.</p>
                <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Tìm Hiểu Thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Category Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
            <h1>Khám Phá Các Chủ Đề Hàng Đầu</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-1.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Web Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-2.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Development</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-3.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Game Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-4.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Apps Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-5.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Marketing</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-6.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Research</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-7.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Content Writing</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/cat-8.jpg" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">SEO</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category Start -->


<!-- Courses Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
            <h1>Các Khoá Học Phổ Biến</h1>
        </div>
        <div class="row">
            <?php
            $popularCourses = getPopularCourses(6);
            
            if (empty($popularCourses)) {
                echo '<div class="col-12"><p class="text-center">Không có khóa học nào.</p></div>';
            }
            
            foreach ($popularCourses as $course) :
                // Format hiển thị
                $rating = number_format($course['rating'], 1);
                $totalRatings = $course['total_ratings'];
                $totalStudents = $course['total_students'];
                // Định dạng tiền USD
                $price = '$' . $course['price'];
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="rounded overflow-hidden mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/course/<?= $course['image'] ?>"
                        alt="<?= htmlspecialchars($course['title']) ?>">
                    <div class="bg-secondary p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i
                                    class="fa fa-users text-primary mr-2"></i><?= $totalStudents ? number_format($totalStudents) . " Học viên" : "Chưa có học viên" ?></small>
                            <small class="m-0"><i
                                    class="far fa-clock text-primary mr-2"></i><?= $course['duration'] ?: "Chưa cập nhật" ?></small>
                        </div>
                        <a class="h5"
                            href="<?= BASE_URL ?>/router.php?page=course-detail&id=<?= $course['id'] ?>"><?= htmlspecialchars($course['title']) ?></a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0">
                                    <i class="fa fa-star text-primary mr-2"></i>
                                    <?= $rating ?>
                                    <small>(<?= $totalRatings ? number_format($totalRatings) . " đánh giá" : "Chưa có đánh giá" ?>)</small>
                                </h6>
                                <h5 class="m-0"><?= number_format($course['price'], 0, ',', '.') ?>đ</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Courses End -->


<!-- Registration Start -->
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Need Any Courses</h5>
                    <h1 class="text-white">30% Off For New Students</h1>
                </div>
                <p class="text-white">Đăng ký ngay hôm nay để nhận ưu đãi đặc biệt dành cho học viên mới.
                    Chúng tôi cam kết mang đến chất lượng đào tạo tốt nhất với đội ngũ giảng viên chuyên nghiệp
                    và hệ thống học liệu được cập nhật liên tục.</p>
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Giảng viên giàu kinh nghiệm, tận tâm
                    </li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Học liệu chất lượng, cập nhật thường
                        xuyên</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Hỗ trợ học tập 24/7</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-light text-center p-4">
                        <h1 class="m-0">Sign Up Now</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-primary p-5">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Họ và tên"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Email"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Chọn khóa học</option>
                                    <option value="1">Khóa học 1</option>
                                    <option value="2">Khóa học 2</option>
                                    <option value="3">Khóa học 3</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit">Đăng Ký Ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration End -->


<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Teachers</h5>
            <h1>Meet Our Teachers</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="<?= BASE_URL ?>/img/team-1.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>Jhon Doe</h5>
                        <p class="m-0">Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="<?= BASE_URL ?>/img/team-2.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>Jhon Doe</h5>
                        <p class="m-0">Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="<?= BASE_URL ?>/img/team-3.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>Jhon Doe</h5>
                        <p class="m-0">Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="<?= BASE_URL ?>/img/team-4.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>Jhon Doe</h5>
                        <p class="m-0">Web Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Testimonial</h5>
            <h1>What Say Our Students</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel testimonial-carousel">
                    <div class="text-center">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <h4 class="font-weight-normal mb-4">Khóa học rất bổ ích và thiết thực. Giảng viên nhiệt tình,
                            tận tâm hướng dẫn. Tôi đã học được rất nhiều kiến thức mới và áp dụng được vào công việc
                            thực tế. Cảm ơn ECourses!</h4>
                        <img class="img-fluid mx-auto mb-3" src="<?= BASE_URL ?>/img/testimonial-1.jpg" alt="">
                        <h5 class="m-0">Nguyễn Văn A</h5>
                        <span>Lập Trình Viên</span>
                    </div>
                    <div class="text-center">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <h4 class="font-weight-normal mb-4">Nội dung khóa học được thiết kế rất khoa học và dễ hiểu.
                            Tôi đặc biệt ấn tượng với phương pháp giảng dạy và hệ thống bài tập thực hành. Sẽ giới thiệu
                            cho bạn bè cùng tham gia!</h4>
                        <img class="img-fluid mx-auto mb-3" src="<?= BASE_URL ?>/img/testimonial-2.jpg" alt="">
                        <h5 class="m-0">Trần Thị B</h5>
                        <span>Thiết Kế Đồ Họa</span>
                    </div>
                    <div class="text-center">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <h4 class="font-weight-normal mb-4">ECourses là một lựa chọn tuyệt vời cho những ai muốn học
                            trực tuyến. Tôi có thể học mọi lúc mọi nơi và luôn nhận được sự hỗ trợ kịp thời từ đội ngũ
                            giảng viên.</h4>
                        <img class="img-fluid mx-auto mb-3" src="<?= BASE_URL ?>/img/testimonial-3.jpg" alt="">
                        <h5 class="m-0">Lê Văn C</h5>
                        <span>Chuyên Viên Marketing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Blog</h5>
            <h1>Latest From Our Blog</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/blog-1.jpg" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">5 Bí Quyết Để Học Lập Trình Hiệu Quả Cho Người Mới Bắt Đầu
                        </h5>
                        <p class="text-primary m-0">05 Tháng 11, 2025</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/blog-2.jpg" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Những Xu Hướng Công Nghệ Mới Nhất Trong Năm 2025
                        </h5>
                        <p class="text-primary m-0">05 Tháng 11, 2025</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="<?= BASE_URL ?>/img/blog-3.jpg" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Tại Sao Nên Chọn Nghề Lập Trình Trong Thời Đại 4.0
                        </h5>
                        <p class="text-primary m-0">05 Tháng 11, 2025</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/../views/layout/footer.php';
?>