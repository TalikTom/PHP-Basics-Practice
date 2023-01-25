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
//    $slider = (isset($_POST['slider']) and $_POST['slider'] == true) ? true : false;
    $color = $_POST['color'];
    $name = $_POST['name'];
    setcookie('color', $color, time() + 60 * 60, '/', '', false, true);
    setcookie('name', $name);
}

$scheme = (in_array($color, $options)) ? $color : 'dark';

$message = 'Page views: ' . $counter;
$message2 = 'This name was stored in a cookie: ' . $name;


?>

<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>

<div class="main_container">
    <div class="main_content">
        <h1>Cookies</h1>
        <p><?= "$message <br>" ?></p>
        <p><?= "$message2 <br>" ?></p>

        <p>Refresh this <a href="/views/cookies.view.php">Page</a> to see increase in views</p>


            <form class= "cookies_form" action="/views/cookies.view.php" method="POST">
                <label for="color">Pick a theme</label>
                <select name="color" id="color">
                    <option value="dark">Dark</option>
                    <option value="light">Light</option>
                </select><br>
            <!--    <label class="switch">-->
            <!--        <input type="checkbox" name="slider" value="true">-->
            <!--        <span class="slider round"></span>-->
            <!--    </label>-->
                <label for="name">Enter a name</label>
                <input type="text" name="name" id="name" >

                <input class="btn" type="submit" value="Save">
            </form>
    </div>
</div>
<?php include 'partials/footer.php'?>