
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
<!--                <h4 class="font-weight-bold mb-3">Comments --><?php //echo count($comments) ?><!--</h4>-->
                <div class="bg-gray p-5 mb-4">
                    <?php foreach($comments as $comment) : ?>
                    <div class="media border-bottom py-4">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $comment->first_name . ' '. $comment->last_name; ?></h5>
                            <p><?php echo $comment->created_at; ?></p>
                            <p><?php echo $comment->body; ?></p>


                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <h4 class="font-weight-bold mb-3 border-bottom pb-3">Leave a Comment</h4>


<!--                Comment Form-->
            <form action="/show?id=<?php echo $post->id; ?>" class="row" method="post">
                <div class="col-md-6">
                    <input type="text"  placeholder="First Name" name="first_name" value="<?php echo (!empty($comment_new->first_name)) ? $comment_new->first_name : ''; ?>"
                           class="form-control mb-3 <?php echo (!empty($comment_new->first_name_err)) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo (!empty($comment_new->first_name_err)) ? $comment_new->first_name_err : '' ?>
                    </div>
                    <input type="text"  placeholder="Last Name" name="last_name" value="<?php echo (!empty($comment_new->last_name)) ? $comment_new->last_name : ''; ?>"
                           class="form-control mb-3 <?php echo (!empty($comment_new->last_name_err)) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo (!empty($comment_new->last_name_err)) ? $comment_new->last_name_err : '' ?>
                    </div>
                    <input type="email"  placeholder="Email *" name="email" value="<?php echo (!empty($comment_new->email)) ? $comment_new->email : ''; ?>"
                           class="form-control mb-3 <?php echo (!empty($comment_new->email_err)) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo (!empty($comment_new->email_err)) ? $comment_new->email_err : '' ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <textarea name="body" id="body" placeholder="Message" class="form-control mb-4
                    <?php echo (!empty($comment_new->body_err)) ? 'is-invalid' : ''; ?>"></textarea>
                    <div class="invalid-feedback">
                        <?php echo (!empty($comment_new->body_err)) ? $comment_new->body_err : '' ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </div>

            </form>
                <br>
<!--                Twitter app-->
                <h4 class="font-weight-bold mb-3 border-bottom pb-3">Using Twitter? share your tweets  here!</h4>

                <div class="col-md-6">
                    <div class="posttweetcontainer">
                        <img class="posttweetprofimg" src="http://3.bp.blogspot.com/-JCYefwq__2U/TxCfC3s1ZpI/AAAAAAAAKcM/u5mw7qPAL0w/s300-c/Camilla-Belle-6.jpg">
                        <div class="ml56px">
                            <form action="tweet?id=<?php echo $post->id; ?>"  method="post">
                                <div class="posttweettacontainer">
                                    <textarea name="status" id="status" placeholder="What's happening?" class="posttweetta form-control
                                    <?php echo (!empty($tweet->status_err)) ? 'is-invalid' : ''; ?>"></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo (!empty($tweet->status_err)) ? $tweet->status_err : '' ?>
                                    </div>
<!--                                  fali javascript-->
<!--                                    <div class="posttweetcountcont">-->
<!--                                        <span class="posttweetcount"><span id="totalchars">0</span>/250</span>-->
<!--                                    </div>-->
                                </div>
                                <div class="posttweetbutcont">
                                    <button type="submit" id="posttweetbut" class="posttweetbut">Tweet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!--                original kraj-->
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
