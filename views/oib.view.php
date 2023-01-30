<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>


    <div class="center-grid">
        <h1>OIB Generator</h1>


        <?php
        $oib = OIB::oibMaker();
        echo '<p class="large-text box-shadow" id="single">' . $oib . '</p>';

        ?>
        <button class="btn" type="button" onclick="copyEvent('single')">Copy to clipboard</button>
        <form class="generator" action="/oib-generator" method="POST">
            <label for="quantity">Enter how many OIBs you need:</label>
            <input type="number" name="quantity" id="quantity" value="<?= $_POST['quantity'] ?? '' ?>">
            <input type="submit" value="Get me fresh OIBs!">
        </form>


        <button type="button" onclick="copyEvent('copy')" class="btn">Copy to clipboard</button>
        <p id="copy" class="generator-text box-shadow">
            <?php
            if (is_numeric($_POST['quantity'] ?? '') === true) {
                $oibA = OIB::oibMore($quantity);
                foreach ($oibA as $o) {
                    echo $o, '<br>';
                }
            }
            ?>
            <?php if (isset($errors['quantity'])) : ?>
              <p><?= $errors['quantity'] ?></p>
            <?php endif; ?>


        </p>


    </div>

<?php include 'partials/footer.php' ?>