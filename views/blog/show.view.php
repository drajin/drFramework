<?php echo("<pre>"); ?>
<?php var_dump($comments);  ?>
<?php echo("</pre>"); ?>
<section class="page-title bg-primary position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white font-tertiary">Blogs <?php  ?></h1>
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

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="font-tertiary mb-5"><?php echo $post->title; ?></h3>
                <p class="font-secondary">Published on <?php echo $post->created_at ?> by <span class="text-primary"><?php echo $user->name ?></span
                        class="text-primary"> on <span>UX design</span></p>

                <div class="content">
                    <?php echo $post->body ?>
                </div>

            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="font-weight-bold mb-3">Comments <?php echo count($comments) ?></h4>
                <div class="bg-gray p-5 mb-4">
                    <?php foreach($comments as $comment) : ?>
                    <div class="media border-bottom py-4">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $comment->author; ?></h5>
                            <p><?php echo $comment->created_at; ?></p>
                            <p><?php echo $comment->body; ?></p>


                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <h4 class="font-weight-bold mb-3 border-bottom pb-3">Leave a Comment</h4>
                <form action="#" class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" placeholder="First Name" name="fname" id="fname">
                        <input type="text" class="form-control mb-3" placeholder="Last Name" name="lname" id="lname">
                        <input type="text" class="form-control mb-3" placeholder="Email *" name="mail" id="mail">
                    </div>
                    <div class="col-md-6">
                        <textarea name="comment" id="comment" placeholder="Message" class="form-control mb-4"></textarea>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Similar Stories</h2>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <article class="card shadow">
                    <img class="rounded card-img-top" src="images/blog/post-3.jpg" alt="post-thumb">
                    <div class="card-body">
                        <h4 class="card-title"><a class="text-dark" href="blog-single.html">Amazon increase income 1.5 Million</a>
                        </h4>
                        <p class="cars-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et
                            dolore magna aliqua.</p>
                        <a href="blog-single.html" class="btn btn-xs btn-primary">Read More</a>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <article class="card shadow">
                    <img class="rounded card-img-top" src="images/blog/post-4.jpg" alt="post-thumb">
                    <div class="card-body">
                        <h4 class="card-title"><a class="text-dark" href="blog-single.html">Amazon increase income 1.5 Million</a>
                        </h4>
                        <p class="cars-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et
                            dolore magna aliqua.</p>
                        <a href="blog-single.html" class="btn btn-xs btn-primary">Read More</a>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <article class="card shadow">
                    <img class="rounded card-img-top" src="images/blog/post-2.jpg" alt="post-thumb">
                    <div class="card-body">
                        <h4 class="card-title"><a class="text-dark" href="blog-single.html">Amazon increase income 1.5 Million</a>
                        </h4>
                        <p class="cars-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et
                            dolore magna aliqua.</p>
                        <a href="blog-single.html" class="btn btn-xs btn-primary">Read More</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- /blog -->

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
