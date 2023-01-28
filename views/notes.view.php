<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
    <main>
        <?php foreach ($notes as $note) : ?>

            <li><a href="/note?user_id=<?= $note['user_id'] ?>"><?= $note['body'] ?></a></li>

        <?php endforeach; ?>
    </main>
<?php include 'partials/footer.php' ?>