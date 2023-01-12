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
<?php
echo '<table style="text-align: right;">';
    for($i=1;$i<=10;$i++){
    echo '<tr>';
        for($j=1;$j<=10;$j++){
        echo '<td>' . $i * $j, '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    ?>

<?php include 'includes/footer.php'; ?>
</body>
<script src="script.js"></script>
</html>