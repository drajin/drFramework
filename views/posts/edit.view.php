

<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Blog Posts</span>
        <h3 class="page-title">Edit Post</h3>
    </div>
</div>
<!-- End Page Header -->

<?php use app\core\Application; ?>
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


<div class="row">
    <div class="col-lg-9 col-md-12">
        <!-- Add New Post Form -->
        <div class="card card-small mb-3">
            <div class="card-body">


                <form class="update-post" action="/edit?id=<?= $post->id ?>" class="row" method="post">

                    <input class="form-control form-control-lg mb-3 <?php echo (!empty($title_err)) ? 'is-invalid' : '' ?>"
                           type="text" name="title" placeholder="Your Post Title" value="<?= $post->title ?>">

                    <div class="invalid-feedback">
                        <?php echo (!empty($title_err)) ? $title_err : '' ?>
                    </div>

                    <textarea class="form-control form-control-lg mb-3 <?php echo (!empty($body_err)) ? 'is-invalid' : ''; ?>"
                              rows="9" name="body" placeholder="Your Post Text"
                    ><?= $post->body ?></textarea>

                    <div class="invalid-feedback">
                        <?php echo (!empty($body_err)) ? $body_err : '' ?>
                    </div>

                    <button class="btn btn-sm btn-accent ml-auto" type="submit" value="submit">
                        <i class="material-icons">update</i> Update</button>
                    <div id="editor-container" class="add-new-post__editor mb-1"></div>
                </form>
            </div>
        </div>
        <!-- / Add New Post Form -->
    </div>
    <div class="col-lg-3 col-md-12">
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">Actions</h6>
            </div>
            <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">add</i>
                          <strong class="mr-1"><a href="create">Add new Post</a></strong>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">preview</i>
                          <strong class="mr-1"><a href="show?id=<?= $post->id ?>">View on a front Page</a></strong>
                        </span>
                        <span class="d-flex mb-2">
                        <form method="post" action="/delete?id=<?= $post->postId ?>" >
                                <input type="hidden" name="_method" value="delete">
                                <div id="operations">
                                    <i class="material-icons mr-1">delete_forever</i>
                                    <input class="btn btn-sm btn-outline-danger mr-1" type="submit" name="commit" value="Remove Post" />
                                </div>
                        </form>


                        </span>
                    </li>
                    <li class="list-group-item d-flex px-3">
                        <a href="dashboard"><button class="btn btn-sm btn-outline-accent">
                            <i class="material-icons">cancel</i> Cancel</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- / Post Overview -->

    </div>
</div>