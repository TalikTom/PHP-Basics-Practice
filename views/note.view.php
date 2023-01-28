<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
    <main>
        <a href="/notes">Go back</a>
        <?php foreach ($note as $not) : ?>

            <li><?= $not['body'] ?></li>

        <?php endforeach; ?>
    </main>
<?php include 'partials/footer.php' ?>