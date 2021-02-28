<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand font-tertiary h3" href="/"><img src="images/logo.png" alt="Myself"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
                <?php if(isset($_SESSION['user_name'])) : ?>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="dashboard">Your Dashboard</a>
                </li>
                <?php endif; ?>
            </ul>

            <?php if(isset($_SESSION['user_name'])) : ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Welcome <?= $_SESSION['user_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>
            <?php endif; ?>

        </div>
    </nav>
</header>