<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = (int)$_POST['quantity'];

    if ($quantity === 0) {
        $quantity = '';
    }
}
?>


<div class="center-grid">
    <form action="/oib-generator" method="POST">
        <label for="quantity">Enter how many OIBs you need:</label>
        <input type="int" name="quantity" id="quantity" value="<?= htmlspecialchars($quantity) ?>">
        <input type="submit">
    </form>


    <input type="text"
           value=""
           id="textbox">
    <button onclick="copyText()">
        Copy text
    </button>
    <script>
        function copyText() {
            let copyText = document.getElementById("textbox");
            copyText.select();
            document.execCommand("copy");
            document.getElementById("message")
                .innerHTML ="Copied the text!"
        }
    </script>
    <p>
        Click on the button to copy the text from the
        text field.
    </p>
    <p id="message"></p>

<?php
$oib = OIB::oibMaker();
echo '<p class="large-text">' . $oib . '</p>';

$oibA = OIB::oibMore($quantity);
foreach ($oibA as $o) {
    echo $o, '<br>';
}

?>
</div>

<?php include 'partials/footer.php'?>