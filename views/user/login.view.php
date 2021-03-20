<?php  use app\core\Application; ?>
<?php use app\controllers\FacebookUserController;
$facebookLogin = new FacebookUserController;

?>
<?php
if(isset($_SESSION['user_email_address'])) {
    echo $_SESSION['user_email_address'];
} else 'Not';
//$client = new Google_Client();
//$client->setClientId(GOOGLE_CLIENT_ID);
//$client->setClientSecret(GOOGLE_CLIENT_SECRET);
//$client->setRedirectUri('http://localhost:8080/login');
//
//
//
////next two line added to obtain refresh_token
//$client->setAccessType('offline');
//$client->setApprovalPrompt('force');
//
//
//$client->addScope("email");
//$client->addScope("profile");
//
//
//// authenticate code from Google OAuth Flow
//function googleUser($client) {
//
//    if (isset($_GET['code'])) {
//        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//        $client->setAccessToken($token['access_token']);
//
//        // get profile info
//        $google_oauth = new Google_Service_Oauth2($client);
//        $google_account_info = $google_oauth->userinfo->get();
//        echo ('<pre>');
//        var_dump($google_account_info);
//        echo ('</pre>');
//        $email =  $google_account_info->email;
//        $name =  $google_account_info->name;
//
//        // now you can use this profile info to create account in your website and make user logged in.
//    } else {
//        return $client->createAuthUrl();
//    }
//
//}

?>

<?php
//FACEBOOK












//DOVDE






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
<!--                        <div class="section-action-container">-->
<!--                            <div class="d-grid gap-2">-->
<!--                                <a class="btn btn-gm" href="--><?php //echo $user_model->googleUser(); ?><!--" role="button">Login with Google (PHP)</a>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="section-action-container">
                            <div class="d-grid gap-2">
                                <a class="btn btn-gm" href="<?php //echo googleUser($client); ?>" role="button">Login with Google (PHP)</a>
                            </div>
                        </div>
                        <div class="section-action-container">
                            <div class="d-grid gap-2">
                                <a class="btn btn-fb" href="<?php echo $facebookLogin->facebookUser(); ?>" role="button">Login with Facebook (PHP)</a>
                            </div>
                        </div>
                        <div class="section-action-container">
                            <div class="d-grid gap-2">
                                <a class="btn btn-tw" href="?>" role="button">Login with Twitter (PHP)</a>
                            </div>
                        </div>
                        <div class="section-action-container">
                            <div class="error-message-api">
<!--                                --><?php //if ( 'fail' == $twitterPreLoginData['status'] ) : // twitter fail ?>
                                    <div>
<!--                                        --><?php //echo $twitterPreLoginData['message']; ?>
                                    </div>
<!--                                --><?php //endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

