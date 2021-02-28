

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Your blog posts </h3>
        </div>
    </div>
    <!-- End Page Header -->
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
                        <td><?= $post->postId; ?></td>
                        <td><?= $post->title; ?></td>
                        <td><?= $post->name; ?></td>
                        <td><?= $post->postCreated; ?></td>
                        <td><a href="view" class="btn btn-secondary">View</a></td>
                        <td><a href="edit" class="btn btn-secondary">Edit</a></td>
                        <td><a href="delete" class="btn btn-secondary">Delete</a></td>
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
                <h6 class="m-0 text-white">Inactive Users</h6>
            </div>
            <div class="card-body p-0 pb-3 bg-dark text-center">
                <table class="table table-dark mb-0">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="border-bottom-0">#</th>
                        <th scope="col" class="border-bottom-0">First Name</th>
                        <th scope="col" class="border-bottom-0">Last Name</th>
                        <th scope="col" class="border-bottom-0">Country</th>
                        <th scope="col" class="border-bottom-0">City</th>
                        <th scope="col" class="border-bottom-0">Phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Graham</td>
                        <td>Brent</td>
                        <td>Benin</td>
                        <td>Ripabottoni</td>
                        <td>1-512-760-9094</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Clark</td>
                        <td>Angela</td>
                        <td>Estonia</td>
                        <td>Borghetto di Vara</td>
                        <td>1-660-850-1647</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Wylie</td>
                        <td>Joseph</td>
                        <td>Korea, North</td>
                        <td>Guelph</td>
                        <td>325-4351</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Garth</td>
                        <td>Clementine</td>
                        <td>Indonesia</td>
                        <td>Narcao</td>
                        <td>722-8264</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Default Dark Table -->