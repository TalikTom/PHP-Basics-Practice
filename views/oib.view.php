<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<?php
$quantity = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = (int)$_POST['quantity'];

}
?>


<div class="center-grid">
    <h1>OIB Generator</h1>


    <?php
    $oib = OIB::oibMaker();
    echo '<p class="large-text" id="single">' . $oib . '</p>';

    ?>
    <button class="btn" type="button" onclick="copyEvent('single')">Copy to clipboard</button>
    <form class="generator" action="/oib-generator" method="POST">
        <label for="quantity">Enter how many OIBs you need:</label>
        <input type="number" name="quantity" id="quantity" value="<?= htmlspecialchars($quantity) ?>">
        <input type="submit" value="Get me fresh OIBs!">
    </form>


    <button type="button" onclick="copyEvent('copy')" class="btn">Copy to clipboard</button>
    <p id="copy" class="generator-text"><?php
        $oibA = OIB::oibMore($quantity);
        foreach ($oibA as $o) {
            echo $o, '<br>';
        }
    ?></p>






</div>

<?php include 'partials/footer.php'?>