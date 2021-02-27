<?php  use app\core\Application;?>
<!--Flash messages-->
<div class="container">
    <div class="alert success">
        <?php if (Application::$app->session->getFlashMsg('success')) : ;?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlashMsg('success') ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>

<section class="section section-on-footer" data-background="images/backgrounds/bg-dots.png">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto">
                <div class="bg-white rounded text-center p-5 shadow-down">
                    <form action="/register" class="row" method="post">
                        <div class="col-md-6">
                            <input type="text" id="name" placeholder="Full Name" name="name" value="<?php echo (!empty($name)) ? $name : ''; ?>"
                                   class="form-control px-0 mb-4 <?php echo (!empty($name_err)) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo (!empty($name_err)) ? $name_err : '' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="email" id="email" placeholder="Email" name="email" value="<?php echo (!empty($email)) ? $email : ''; ?>"
                                   class="form-control px-0 mb-4 <?php echo (!empty($email_err)) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo (!empty($email_err)) ? $email_err : '' ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="password" id="password" placeholder="Password" name="password"
                                   class="form-control px-0 mb-4 <?php echo (!empty($pass_err)) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo (!empty($pass_err)) ? $pass_err : '' ; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="password" id="password_confirm" placeholder="Password Confirm" name="password_confirm"
                                   class="form-control px-0 mb-4  <?php echo (!empty($pass_confirm_err)) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?php echo (!empty($pass_confirm_err)) ? $pass_confirm_err : '' ; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-10 ">
                            <button class="btn btn-primary w-100">Submit</button>
                        </div>
                        <div class="col-lg-6 col-10">
                            <a href="login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>