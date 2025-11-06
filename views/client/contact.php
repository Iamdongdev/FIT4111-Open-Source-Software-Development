<?php
include __DIR__ . '/../../functions/config.php';
include __DIR__ . '/../../views/layout/header.php';
include __DIR__ . '/../../views/layout/nav.php';
?>
<!-- Header Start -->
<div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Contact</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Contact</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Contact</h5>
            <h1>Contact For Any Query</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-secondary rounded p-5">
                    <h4 class="text-center mb-4">Receive messages instantly with our PHP and Ajax contact form -
                        available in the <a href="https://htmlcodex.com/downloading/?item=1427">Pro Version</a> only.
                    </h4>
                    <form>
                        <div class="control-group mb-3">
                            <input type="text" class="form-control border-0 p-4" placeholder="Your Name" />
                        </div>
                        <div class="control-group mb-3">
                            <input type="email" class="form-control border-0 p-4" placeholder="Your Email" />
                        </div>
                        <div class="control-group mb-3">
                            <input type="text" class="form-control border-0 p-4" placeholder="Subject" />
                        </div>
                        <div class="control-group mb-3">
                            <textarea class="form-control border-0 py-3 px-4" rows="5" placeholder="Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php
include __DIR__ . '/../../views/layout/footer.php';
?>