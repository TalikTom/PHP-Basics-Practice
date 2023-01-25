<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>

<div class="center-grid">
    <h1>Press F5</h1>
<?php
$oib = $oib=OIB::oibMaker();
echo '<p class="large-text">' . $oib . '</p>';
?>
</div>
<?php include 'partials/footer.php'?>