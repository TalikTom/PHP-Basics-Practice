<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>
<?php
$name1 = '';
$name2 = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name1 = (int)$_POST['name1'];
    $name2 = (int)$_POST['name2'];

}
?>
?>

<main class="center-grid" >
    <form action="/love-calculator">
        <label for="name1" id="name1">Enter name of the first person</label>
        <input type="text" name="name1">
        <label for="name2" id="name2">Enter name of the second person</label>
        <input type="text" name="name2">
    </form>
</main>

<?php include 'partials/footer.php'?>