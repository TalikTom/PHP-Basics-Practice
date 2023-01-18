<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

</body>
</html>
<nav class="nav_container">
    <ul class="nav_bar">
        <li><a href="/">Home</a></li>
        <li><a href="/cookies.php">Cookies</a></li>
        <li><a href="/multiplication.php">Multiplication</a></li>
    </ul>
</nav>
<div class="main_container">
    <div class="main_content">

        <h2>Get method - Multiplication table</h2>

        <form action="/multiplication.php" method="GET">
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

