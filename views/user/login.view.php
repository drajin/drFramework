

<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto">
                <div class="bg-white rounded text-center p-5 shadow-down">
                    <form action="/login" class="row" method="post">
                        <div class="col-12">
                            <input type="email" id="email" placeholder="Email" name="email" value="<?php echo (!empty($email)) ? $email : ''; ?>"
                                   class="form-control px-0 mb-4 <?php echo (!empty($email_err)) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo $email_err; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="password" id="password" placeholder="Password" name="password" value="<?php echo (!empty($password)) ? $password : ''; ?>"
                                   class="form-control px-0 mb-4 <?php echo (!empty($pass_err)) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo $pass_err; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-10 ">
                            <button class="btn btn-primary w-100">Submit</button>
                        </div>
                        <div class="col-lg-6 col-10">
                            <a href="register" class="btn btn-light btn-block">No account? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>