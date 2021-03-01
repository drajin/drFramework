

<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Blog Posts</span>
        <h3 class="page-title">Edit Post</h3>
    </div>
</div>
<!-- End Page Header -->
<div class="row">
    <div class="col-lg-9 col-md-12">
        <!-- Add New Post Form -->
        <div class="card card-small mb-3">
            <div class="card-body">


                <form class="add-new-post" action="/create" class="row" method="post">

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
                        <i class="material-icons">file_copy</i> Update</button>
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
                          <i class="material-icons mr-1">flag</i>
                          <strong class="mr-1">Status:</strong> Draft
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">visibility</i>
                          <strong class="mr-1">Visibility:</strong>
                          <strong class="text-success">Public</strong>
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">calendar_today</i>
                          <strong class="mr-1">Schedule:</strong> Now
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex">
                          <i class="material-icons mr-1">score</i>
                          <strong class="mr-1">Readability:</strong>
                          <strong class="text-warning">Ok</strong>
                        </span>
                    </li>
                    <li class="list-group-item d-flex px-3">
                        <button class="btn btn-sm btn-outline-accent">
                            <i class="material-icons">save</i> Save Draft</button>

                    </li>
                </ul>
            </div>
        </div>
        <!-- / Post Overview -->

    </div>
</div>