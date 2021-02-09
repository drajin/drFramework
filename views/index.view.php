
<h1>My Tasks</h1>

<?php foreach ($params as $param => $name) : ?>
    <li>
        <?= $param .' '. $name; ?>
    </li>
<?php endforeach; ?>


