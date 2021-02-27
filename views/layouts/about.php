<?php include('head.php'); ?>


<?php include('nav.php'); ?>

<!-- page title -->
<!-- page title -->
<section class="page-title bg-primary position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white font-tertiary">About me</h1>
            </div>
        </div>
    </div>
    <!-- background shapes -->
    <img src="images/illustrations/page-title.png" alt="illustrations" class="bg-shape-1 w-100">
    <img src="images/illustrations/leaf-pink-round.png" alt="illustrations" class="bg-shape-2">
    <img src="images/illustrations/dots-cyan.png" alt="illustrations" class="bg-shape-3">
    <img src="images/illustrations/leaf-orange.png" alt="illustrations" class="bg-shape-4">
    <img src="images/illustrations/leaf-yellow.png" alt="illustrations" class="bg-shape-5">
    <img src="images/illustrations/dots-group-cyan.png" alt="illustrations" class="bg-shape-6">
    <img src="images/illustrations/leaf-cyan-lg.png" alt="illustrations" class="bg-shape-7">
</section>
<!-- /page title -->
<!-- /page title -->

<!-- about -->
<section class="section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident.</p>
                <p>Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
            </div>
        </div>
    </div>
</section>
<!-- /about -->

<!-- Work Process -->
<section class="section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Work Process</h2>
            </div>
            <div class="col-lg-3 col-md-4 text-center hover-shadow pt-3">
                <div class="">
                    <img src="images/icons/plan.png" class="mb-4" alt="icon">
                    <h4 class="mb-4">Research and Plan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 text-center hover-shadow pt-3">
                <img src="images/icons/design.png" class="mb-4" alt="icon">
                <h4 class="mb-4">Design and Develop</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
            </div>
            <div class="col-lg-3 col-md-4 text-center hover-shadow pt-3">
                <img src="images/icons/print.png" class="mb-4" alt="icon">
                <h4 class="mb-4">Deliver</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</section>
<!-- ./Work Process -->



<!-- contact -->
<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Contact Info</h2>
            </div>
            <div class="col-lg-8 mx-auto">
                <div class="bg-white rounded text-center p-5 shadow-down">
                    <h4 class="mb-80">Contact Form</h4>
                    <form action="#" class="row">
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" placeholder="Full Name" class="form-control px-0 mb-4">
                        </div>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" placeholder="Email Address" class="form-control px-0 mb-4">
                        </div>
                        <div class="col-12">
              <textarea name="message" id="message" class="form-control px-0 mb-4"
                        placeholder="Type Message Here"></textarea>
                        </div>
                        <div class="col-lg-6 col-10 mx-auto">
                            <button class="btn btn-primary w-100">send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /contact -->

<div class="content">
    {{content}}
</div>

<!-- footer -->
<footer class="bg-dark footer-section">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-light">Email</h5>
                    <p class="text-white paragraph-lg font-secondary">drajin@gmail.com</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-light">Phone</h5>
                    <p class="text-white paragraph-lg font-secondary">+49 17640417095</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-light">Address</h5>
                    <p class="text-white paragraph-lg font-secondary">Krausenstr. 40, 30171 Hannover</p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top text-center border-dark py-5">
        <p class="mb-0 text-light">Copyright ©<script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script> a theme by <a href="https://themefisher.com">themefisher.com</a></p>
    </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="/../../plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<!--<script src="/../../plugins/bootstrap/bootstrap.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- slick slider -->
<script src="/../../plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="/../../plugins/shuffle/shuffle.min.js"></script>

<!-- Main Script -->
<script src="/../../js/script.js"></script>

</body>
</html>