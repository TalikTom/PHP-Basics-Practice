<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<?php
foreach ($notes as $note) {
    echo '<li>' . $note['body'] . '</li';
}
?>


<?php include 'partials/footer.php'?>