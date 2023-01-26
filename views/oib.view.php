<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = (int)$_POST['quantity'];

    if ($quantity === 0) {
        $quantity = '';
    } else {
        $quantity = '';
    }
}
?>


<div class="center-grid">
    <?php
    $oib = OIB::oibMaker();
    echo '<p class="large-text" id="single">' . $oib . '</p>';

    ?>
    <button type="button" onclick="copyEvent('single')">Copy to clipboard</button>
    <form action="/oib-generator" method="POST">
        <label for="quantity">Enter how many OIBs you need:</label>
        <input type="int" name="quantity" id="quantity" value="<?= htmlspecialchars($quantity) ?>">
        <input type="submit" value="Get me OIBs!">
    </form>


    <button type="button" onclick="copyEvent('copy')">Copy to clipboard</button>
    <p id="copy"><?php
        $oibA = OIB::oibMore($quantity);
        foreach ($oibA as $o) {
            echo $o, '<br>';
        }
    ?></p>






</div>

<?php include 'partials/footer.php'?>