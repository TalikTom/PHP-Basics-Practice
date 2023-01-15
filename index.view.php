<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<nav class="nav_container">
    <ul class="nav_bar">
        <li><a href="/">Home</a></li>
        <li><a href="/cookies.php">Cookies</a></li>
        <li><a href="three.php">Three</a></li>
    </ul>
</nav>
<div class="main_container">
    <div class="main_content">
        <h1>Tables - loops</h1>
        <h2>Get method - Multiplication table</h2>

        <form action="/" method="GET">
            <label for="row">Enter row value</label>
            <input type="text" value="" name="row">
            <label for="row">Enter column value</label>
            <input type="text" value="" name="column">
            <input type="submit" class="btn">
        </form>


        <?php
        $column = $_GET['column'] ?? 0;
        $row = $_GET['row'] ?? 0;

        echo '<table style="text-align: right;">';
        for ($i = 1; $i <= $row; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $column; $j++) {
                echo '<td>' . $i * $j, '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        ?>

        <h2>Post method - Cyclic matrix</h2>
        <form action="/" method="POST">
            <label for="row">Enter row value</label>
            <input type="text" value="" name="row">
            <label for="row">Enter column value</label>
            <input type="text" value="" name="column">
            <input type="submit" class="btn">
        </form>

        <?php
        $columnPost = $_POST['column'] ?? 0;
        $rowPost = $_POST['row'] ?? 0;

        echo '<table style="text-align: right;">';

        for ($i = 1; $i < $rowPost + 1; $i++) {
            echo '<tr>';
            for ($j = 1; $j < $columnPost + 1; $j++) {
                echo '<td>' . $j, '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        ?>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
</body>
<script src="script.js"></script>
</html>