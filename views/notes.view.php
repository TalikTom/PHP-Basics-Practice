<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
    <main class="container">
        <ul>
            <?php foreach ($notes as $note) : ?>

                <li><a href="/note?note_id=<?= $note['note_id'] ?>"><?= htmlspecialchars($note['body']) ?></a></li>

            <?php endforeach; ?>
        </ul>
        <p>
            <a href="/notes/create">Create note</a>
        </p>
    </main>
<?php include 'partials/footer.php' ?>