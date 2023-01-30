<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
    <main class="container">
        <h1>Create a note</h1>
        <form method="POST">
            <label for="body">Enter message</label>
            <input type="text" id="body" name="body" value="<?= $_POST['body'] ?? '' ?>">
            <input type="submit">
            <?php if (isset($errors['body'])) : ?>
                <p><?= $errors['body'] ?></p>
            <?php endif; ?>
        </form>
    </main>
<?php include 'partials/footer.php' ?>