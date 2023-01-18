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

        <h2>Post method - Spiral matrix - Bottom/right start</h2>
        <form action="/" method="POST">
            <label for="row">Enter row value</label>
            <input type="number" value="" name="row" max="10" min="2" placeholder="2-10" required>
            <label for="row">Enter column value</label>
            <input type="number" value="" name="column" max="10" min="2" placeholder="2-10" required>
            <input type="submit" class="btn">
            <label for="beginningPoint">Beginning point</label>
            <select name="beginningPoint" id="beginningPoint">
                <option value="top-right">Top-right</option>
                <option value="top-left">Top-left</option>
                <option value="bottom-right">Bottom-right</option>
                <option value="bottom-left">Bottom-left</option>
            </select>

        </form>

        <?php
        $beginningPoint = $_POST['beginningPoint'] ?? 0;
        $columnPost = $_POST['column'] ?? 0;
        $rowPost = $_POST['row'] ?? 0;
        $matrix = [];
        $endRow = $rowPost - 1;
        $endColumn = $columnPost - 1;
        $beginningRow = 0;
        $beginningColumn = 0;
        $val = 1;
        $options = ['top-right', 'top-left','bottom-right', 'bottom-left'];

        if($beginningPoint ==='bottom-right') {
            while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                    $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';

                }
                $endRow--;

                for ($i = $endRow; $i >= $beginningRow; $i--) {
                    $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                }
                $beginningColumn++;

                if ($val > $rowPost * $columnPost) {
                    break;
                }

                for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                    $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                }
                $beginningRow++;

                if ($val > $rowPost * $columnPost) {
                    break;
                }

                for ($i = $beginningRow; $i <= $endRow; $i++) {
                    $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                }
                $endColumn--;


            }
        }

        if($beginningPoint ==='bottom-left') {
            while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                    if ($i === 0) {
                        $matrix[$endRow][$i] = '<td style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                    } else {
                        $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                    }


                }
                $endRow--;
//
                for ($i = $endRow; $i >= $beginningRow; $i--) {
                    $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                }
                $endColumn--;

                if ($val > $rowPost * $columnPost) {
                    break;
                }
//
                for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                    $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                }
                $beginningRow++;
////
                if ($val > $rowPost * $columnPost) {
                    break;
                }

                for ($i = $beginningRow; $i <= $endRow; $i++) {
                    $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 100 . 'ms;">' . $val++ . '</td>';
                }
                $beginningColumn++;


            }
        }

        if($beginningPoint ==='top-right') {
            while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                    $matrix[$beginningRow][$i] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $beginningRow++;


                for ($i = $beginningRow; $i <= $endRow; $i++) {
                    $matrix[$i][$beginningColumn] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $beginningColumn++;
//
                if ($val > $rowPost*$columnPost) {
                    break;
                }

                for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                    $matrix[$endRow][$i] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $endRow--;
//
                if ($val > $rowPost*$columnPost) {
                    break;
                }

                for ($i = $endRow; $i >= $beginningRow; $i--) {
                    $matrix[$i][$endColumn] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $endColumn--;


            }
        }

        if($beginningPoint ==='top-left') {
            while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                    $matrix[$beginningRow][$i] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $beginningRow++;


                for ($i = $beginningRow; $i <= $endRow; $i++) {
                    $matrix[$i][$endColumn] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $endColumn--;

                if ($val > $rowPost*$columnPost) {
                    break;
                }

                for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                    $matrix[$endRow][$i] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $endRow--;

                if ($val > $rowPost*$columnPost) {
                    break;
                }

                for ($i = $endRow; $i >= $beginningRow; $i--) {
                    $matrix[$i][$beginningColumn] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
                }
                $beginningColumn++;


            }
        }





        echo '<table>';

        for ($i = 0; $i < $rowPost; $i++) {

            echo '<tr>';

            for ($j = 0; $j < $columnPost; $j++) {
                echo $matrix[$i][$j];

            }

            echo '</tr>';

        }

        echo '</table>';


        ?>

        <h2>Post method - Spiral matrix - Top/Left start</h2>
        <form action="/" method="POST">
            <label for="row">Enter row value</label>
            <input type="number" value="" name="row2" max="10" min="2" placeholder="2-10" required>
            <label for="row">Enter column value</label>
            <input type="number" value="" name="column2" max="10" min="2" placeholder="2-10" required>
            <input type="submit" class="btn">
        </form>

        <?php

        $columnPost = $_POST['column2'] ?? 0;
        $rowPost = $_POST['row2'] ?? 0;
        $matrix = [];
        $endRow = $rowPost - 1;
        $endColumn = $columnPost - 1;
        $beginningRow = 0;
        $beginningColumn = 0;
        $val = 1;


        while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


            for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                $matrix[$beginningRow][$i] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
            }
            $beginningRow++;


            for ($i = $beginningRow; $i <= $endRow; $i++) {
                $matrix[$i][$endColumn] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
            }
            $endColumn--;

            if ($val > $rowPost*$columnPost) {
                break;
            }

            for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                $matrix[$endRow][$i] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
            }
            $endRow--;

            if ($val > $rowPost*$columnPost) {
                break;
            }

            for ($i = $endRow; $i >= $beginningRow; $i--) {
                $matrix[$i][$beginningColumn] = '<td style="animation-delay:' . ($val)*100 .'ms;">' . $val++ . '</td>';
            }
            $beginningColumn++;


        }


        echo '<table>';

        for ($i = 0; $i < $rowPost; $i++) {

            echo '<tr>';

            for ($j = 0; $j < $columnPost; $j++) {
                echo $matrix[$i][$j];

            }

            echo '</tr>';

        }

        echo '</table>';

        ?>


        <h2>Get method - Multiplication table</h2>

        <form action="/" method="GET">
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


<?php include 'includes/footer.php'; ?>
</body>
<script src="script.js"></script>
</html>