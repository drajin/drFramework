<!-- / .main-navbar -->
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Components</span>
        <h3 class="page-title">Blog Posts</h3>
    </div>
</div>
<!-- End Page Header -->


    <?php use framework\core\Application; ?>
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


<!--KAN-->

    <div class="row">
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card card-small card-post mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo   $post->title ?></h5>
                    <p class="card-text text-muted"><?php echo   $post->body ?></p>
                </div>
                <div class="card-footer border-top d-flex">
                    <div class="card-post__author d-flex">
                        Written by <?php echo $user->name ?></a>
                        <div class="d-flex flex-column justify-content-center ml-3">
                            <small class="text-muted"><?php echo   $post->created_at ?></a></small>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


</div>