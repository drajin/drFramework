<?php  use app\core\Application; ?>
<?php
        if(Application::$app->session->isUserLoggedIn()){
                Application::$app->response->redirect('/dashboard');
                }
?>

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
<!--Flash messages end-->

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
                        <div class="section-action-container">
                            <div class="d-grid gap-2">
                                <a class="btn btn-tw" href="#" role="button">Login with Twitter (PHP)</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>