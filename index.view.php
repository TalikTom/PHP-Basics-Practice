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
    <h1><?= $greeting; ?></h1>

    <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Chart with buttons to modify options, showing how options can be changed
        on the fly. This flexibility allows for more dynamic charts.
    </p>

    <button id="plain">Plain</button>
    <button id="inverted">Inverted</button>
    <button id="polar">Polar</button>
</figure>

    <?php if ($score >= 90) :?>
        <strong>A</strong>
    <?php elseif ($score >= 80) :?>
        <strong>B</strong>
    <?php elseif ($score >= 70) :?>
        <strong>C</strong>
    <?php elseif ($score >= 60) :?>
        <strong>D</strong>
    <?php else :?>
        <strong>F</strong>
    <?php endif ?>

    <h2><?= $message ?></h2>
    <h2><?= $offer . ' on ' . $day .'s'?></h2>
    <h3><?= $ponuda ?></h3>

</body>
<script src="script.js"></script>
</html>