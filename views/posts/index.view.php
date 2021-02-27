
<h1>My Tasks</h1>

<?php foreach($params['posts'] as $post) : ?>
    <ul>
        <li><?= $post->title; ?></li>
        <p><?= $post->body; ?></p>
    </ul>
<?php endforeach; ?>