<?php

$counter = $_COOKIE['counter'] ?? 0;
$counter = $counter + 1;
setcookie('counter', $counter);
$name = $_COOKIE['name'] ?? 0;
setcookie('name', $name);
$name = 'Luka';
$slider = '';
$color = $_COOKIE['color'] ?? null;
$options = ['light', 'dark'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $slider = (isset($_POST['slider']) and $_POST['slider'] == true) ? true : false;
    $color = $_POST['color'];
    $name = $_POST['name'];
    setcookie('color', $color, time() + 60 * 60, '/', '', false, true);
    setcookie('name', $name);
}

$scheme = (in_array($color, $options)) ? $color : 'dark';

$message = 'Page views: ' . $counter;
$message2 = 'This name was stored in a cookie: ' . $name;


?>
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
<body class="<?= htmlspecialchars($scheme) ?> <?= $slider ? 'light' : 'dark' ?>" >
<nav class="nav_container">
    <ul class="nav_bar">
        <li><a href="/">Home</a></li>
        <li><a href="/cookies.php">Cookies</a></li>
        <li><a href="three.php">Three</a></li>
    </ul>
</nav>
<div class="main_container">
    <div class="main_content">
<h1>Cookies</h1>
<p>
    <?= "$message <br>" ?>
    <?= $message2 ?>


<p>Refresh this <a href="/cookies.php">Page</a> to see increase in views</p>
</p>

<form class= "cookies_form" action="/cookies.php" method="POST">
    <label for="color">Pick a theme</label>
    <select name="color" id="color">
        <option value="dark">Dark</option>
        <option value="light">Light</option>
    </select><br>
    <label class="switch">
        <input type="checkbox" name="slider" value="true">
        <span class="slider round"></span>
    </label>
    <label for="name">Enter a name</label>
    <input type="text" name="name" id="name" >

    <input class="btn" type="submit" value="Save">
</form>
    </div>
</div>
</body>
</html>