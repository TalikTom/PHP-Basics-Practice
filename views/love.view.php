<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>

<?php
$name1 = '';
$name2 = '';
$namesTogether = '';
$valid = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];

    $name1 = mb_strtolower($name1);
    $name2 = mb_strtolower($name2);

    $valid = is_string($name1);



    $name1 = str_replace(' ', '', $name1);
    $name2 = str_replace(' ', '', $name2);

    $namesTogether = $name1 . $name2;

    $namesTogether = mb_str_split($namesTogether);
    $namesTogether2 = array_count_values($namesTogether);

    $repeatedLettersCount = [];

    $repeatedLettersCount = LoveCalc::countValues($namesTogether, $namesTogether2);
    $repeatedLettersCountName1 = array_slice($repeatedLettersCount, 0, mb_strlen($name1));
    $repeatedLettersCountName2 = array_slice($repeatedLettersCount, mb_strlen($name1), mb_strlen($name2));

}
?>


<?php
if ($valid) {
    echo $name1, '<br>';

    foreach ($repeatedLettersCountName1 as $i) {
        echo $i;
    }
    echo '<br>' .$name2 . '<br>'  ;

    foreach ($repeatedLettersCountName2 as $i) {
        echo $i;
    }
} else {
    echo 'please enter names using only characters a to ž';
}
?>



    <main class="center-grid">
        <form action="/love-calculator" method="POST">
            <label for="name1" id="name1">Enter name of the first person</label>
            <input type="text" name="name1">
            <label for="name2" id="name2">Enter name of the second person</label>
            <input type="text" name="name2">
            <input type="submit">
        </form>
    </main>

<?php include 'partials/footer.php' ?>