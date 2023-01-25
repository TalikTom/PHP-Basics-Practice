<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<div class="main_container">
    <div class="main_content">

        <h1>Get method - Multiplication table</h1>

        <form action="/views/multiplication.view.php" method="GET">
            <label for="row">Enter row value</label>
            <input type="number" value="" name="row" placeholder="1-10" max="10" min="1" required>
            <label for="row">Enter column value</label>
            <input type="number" value="" name="column" placeholder="1-10" max="10" min="1" required>
            <input type="submit" class="btn">
        </form>
        <?php
        $column = $_GET['column'] ?? 0;
        $row = $_GET['row'] ?? 0;


        echo '<table>';
        for ($i = 1; $i <= $row; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $column; $j++) {
                echo '<td>' . $i * $j, '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        ?>
    </div>

</div>

<?php include 'partials/footer.php'?>