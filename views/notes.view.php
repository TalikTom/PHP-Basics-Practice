<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<main>
    <?php
    foreach ($notes as $note){
        echo '<li>' . $note['body'] . '</li>';
    }
    ?>

    <?php foreach ($notes as $note) : ?>

    <li><a href="/notes/?id=<?= $note['user_id'] ?>"><?= $note['body'] ?></a></li>

    <?php endforeach; ?>
</main>
<?php include 'partials/footer.php'?>