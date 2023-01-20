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
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<?php include 'includes/greeting.php'; ?>

<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/misc/about.view.php?broj1=1&broj2=2&broj3=3">About</a></li>
    </ul>
</nav>
<a href="../misc/about.view.php">Link</a>

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
<h4>Prices for multiple packs</h4>

<p>
    <?php
    while ($counts <= $packs) {
        echo $counts;
        echo ' packs cost $';
        echo $price * $counts;
        echo '<br>';
        $counts++;
    }
    ?>
</p>

<p>
    <?php
    while ($lollypopCount < $lollypopPacks) {
        if ($lollypopCount <= 1) {
            echo $lollypopCount;
            echo ' lollypop cost $';
            echo $lollypopCount * $lollypopPrice;
            echo '<br>';
            $lollypopCount++;
        } else {
            echo $lollypopCount;
            echo ' lollypops costs $';
            echo $lollypopCount * $lollypopPrice;
            echo '<br>';
            $lollypopCount++;
        }
    }
    ?>
</p>
<p>
    <?php
    do {
        echo $packs;
        echo ' packs cost $';
        echo $price * $packs;
        echo '<br>';
        $packs--;
    } while ($packs > 0);
    ?>
</p>

<p>
    <?php
    for($z = 10; $z<=100; $z += 10) {
        echo $z;
        echo ' packs cost $';
        echo $price * $z;
        echo '<br>';
    }
    ?>
</p>

<?php foreach($products as $item => $price) { ?>
    <li>
        <b><?= $item ?></b> - $<?= $price ?>
    </li>
<?php } ?>

<h5>Price list</h5>
<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
    </tr>

    <?php foreach($products as $item => $price) { ?>
        <tr>
            <td><?= $item ?></td>
            <td>$ <?= $price ?></td>
        </tr>
    <?php } ?>
</table>
<table>
    <tr><th colspan="2" class="title">Data about broswer sent in HTTP headers</th></tr>
    <tr><th>Broswer IP address</th><td><?= $_SERVER['REMOTE_ADDR'] ?></td></tr>
    <tr><th>Type of browser</th><td><?= $_SERVER['HTTP_USER_AGENT'] ?></td></tr>
    <tr><th colspan="2" class="title">HTTP request</th></tr>
    <tr><th>Host name</th><td><?= $_SERVER['HTTP_HOST'] ?></td></tr>
    <tr><th>URI after host name</th><td><?= $_SERVER['REQUEST_URI'] ?></td></tr>
    <tr><th>Query string</th><td><?= $_SERVER['QUERY_STRING'] ?></td></tr>
    <tr><th>HTTP request method</th><td><?= $_SERVER['REQUEST_METHOD'] ?></td></tr>
    <tr><th colspan="2" class="title">Location of the file being executed</th></tr>
    <tr><th>Document root</th><td><?= $_SERVER['DOCUMENT_ROOT'] ?></td></tr>
    <tr><th>PATH from document root</th><td><?= $_SERVER['SCRIPT_NAME'] ?></td></tr>
    <tr><th>Absolute path</th><td><?= $_SERVER['SCRIPT_FILENAME'] ?></td></tr>

</table>

<table>
    <tr>
        <th>Lowercase:</th>
        <td><?= strtolower($text) ?></td>
    </tr>
    <tr>
        <th>Uppercase:</th>
        <td><?= strtoupper($text) ?></td>
    </tr>
    <tr>
        <th>Uppercase first letter:</th>
        <td><?= ucwords($text) ?></td>
    </tr>
    <tr>
        <th>Character count:</th>
        <td><?= strlen($text) ?></td>
    </tr>
    <tr>
        <th>Word count:</th>
        <td><?= str_word_count($text) ?></td>
    </tr>
</table>

<table>
    <tr>
        <th>First match (case-sensitive):</th>
        <td>"T" - <?=strpos($text, 'T'); ?></td>
        <td>"t"- <?=strpos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>First match (case-insensitive)</th>
        <td>"T" - <?=stripos($text, 'T'); ?></td>
        <td>"t" - <?=stripos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>Last match (case-sensitive):</th>
        <td>"T" - <?=strrpos($text, 'T'); ?></td>
        <td>"t"- <?=strrpos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>Last match (case-insensitive)</th>
        <td>"T" - <?=strripos($text, 'T'); ?></td>
        <td>"t" - <?=strripos($text, 't'); ?></td>
    </tr>
    <tr>
        <th>Text after first match (case-sensitive)</th>
        <td>"B" - <?=strstr($text, 'B'); ?></td>
    </tr>
    <tr>
        <th>Text after first match (case-insensitive)</th>
        <td>"B" - <?=stristr($text, 'B'); ?></td>
    </tr>
</table>