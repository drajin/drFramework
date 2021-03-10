

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Blog Posts and Comments</h3>
        </div>
    </div>
    <!-- End Page Header -->


<?php use app\core\Application; ?>

    <!--Flash messages-->

    <div class="container">
            <?php if (Application::$app->session->getFlashMsg('success')) : ?>
                <div class="alert alert-success">
                    <?php echo Application::$app->session->getFlashMsg('success'); ?>
                    <?php Application::$app->session->destroyMsg(); ?>
                </div>
            <?php endif; ?>
    <!--Flash messages end-->

<!-- Default Light Table -->
<div class="row">
    <div class="col">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Latest posts</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">Title</th>
                        <th scope="col" class="border-0">Written by</th>
                        <th scope="col" class="border-0">Created at</th>
                        <th scope="col" class="border-0">View</th>
                        <th scope="col" class="border-0">Edit</th>
                        <th scope="col" class="border-0">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($params['posts'] as $post) : ?>
                    <tr>
                        <td><?php echo $post->postId; ?></td>
                        <td><?php echo $post->title; ?></td>
                        <td><?php echo $post->name; ?></td>
                        <td><?php echo $post->postCreated; ?></td>
                        <td><a href="view?id=<?php echo $post->postId ?>" class="btn btn-secondary">View</a></td>
                        <?php if(isset($_SESSION['user_id']) && $post->user_id == $_SESSION['user_id']) : ?>
                        <td><a href="edit?id=<?php echo $post->postId ?>" class="btn btn-secondary">Edit</a></td>
                        <td>
                            <form method="post" action="/delete?id=<?php echo $post->postId ?>" >
                                <input type="hidden" name="_method" value="delete">
                                <div id="operations">
                                    <input type="submit" name="commit" class="btn btn-secondary" value="Delete" />
                                </div>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Default Light Table -->
<!-- Default Dark Table -->
<div class="row">
    <div class="col">
        <div class="card card-small overflow-hidden mb-4">
            <div class="card-header bg-dark">
                <h6 class="m-0 text-white">Remove your Comments</h6>
            </div>
            <div class="card-body p-0 pb-3 bg-dark text-center">
                <table class="table table-dark mb-0">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="border-bottom-0">Post title</th>
                        <th scope="col" class="border-bottom-0">Comment Preview</th>
                        <th scope="col" class="border-bottom-0">Author</th>
                        <th scope="col" class="border-bottom-0">Created at</th>
                        <th scope="col" class="border-0">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($comments as $comment) : ?>
                    <tr>
                        <td><?php echo $comment->title ?></td>
                        <td><?php echo implode(' ', array_slice(explode(' ', $comment->body), 0, 3)); ?></td>
                        <td><?php echo $comment->name ?></td>
                        <td><?php echo $comment->created_at ?></td>
                        <td>
                            <form method="post" action="/delete_comment?id=<?php echo $comment->commentId ?>" >
                                <input type="hidden" name="_method" value="delete">
                                <div id="operations">
                                    <input type="submit" name="commit" class="btn btn-secondary" value="Delete" />
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Default Dark Table -->