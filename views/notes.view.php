<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<main>
    <?php
    foreach ($notes as $note){
        echo '<li>' . $note['body'] . '</li>';
    }
    ?>
</main>
<?php include 'partials/footer.php'?>