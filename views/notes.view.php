<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
    <main>
        <ul>
            <?php foreach ($notes as $note) : ?>

                <li><a href="/note?user_id=<?= $note['user_id'] ?>"><?= $note['body'] ?></a></li>

            <?php endforeach; ?>
        </ul>
        <p>
            <a href="/notes/create">Create note</a>
        </p>
    </main>
<?php include 'partials/footer.php' ?>