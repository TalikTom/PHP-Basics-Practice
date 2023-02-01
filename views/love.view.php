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



    function equalize_array_length($array1, $array2) {
        if (count($array1) < count($array2)) {
            $diff = count($array2) - count($array1);
            for ($i = 0; $i < $diff; $i++) {
                array_push($array1, 0);
            }
        } else if (count($array2) < count($array1)) {
            $diff = count($array1) - count($array2);
            for ($i = 0; $i < $diff; $i++) {
                array_push($array2, 0);
            }
        }
        return [$array1, $array2];
    }

    $newArrays = equalize_array_length($repeatedLettersCountName1,$repeatedLettersCountName2);

    $array = array_merge($newArrays[0], $newArrays[1]);



    function loveCalculator(array $numbers, $result = '')
    {
        $arrayStringify = implode($numbers);
        $numbers = preg_split('//u', $arrayStringify, -1, PREG_SPLIT_NO_EMPTY);

        if (count($numbers) == 2)
        {
            return implode($numbers);
        }

        for ($i = 0; $i < count($numbers) - 1; $i++)
        {
            $numbers[$i] = $numbers[$i] + $numbers[count($numbers) - 1];
            array_pop($numbers);
            $result .= '<li>' . implode($numbers) . '</li>';

        }

        return $result . loveCalculator($numbers);

    }

    $love = loveCalculator($array);


    $string = $love;
    $explodedArray = explode("</li>", $string);
    $explodedArray2 = array_pop($explodedArray);
    echo'<pre>';
    print_r($explodedArray);
    echo'</pre>';


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
        <?php
        echo '<br>' . implode($array), '<br>';
        ?>
        <?php foreach ($explodedArray as $n){
            echo $n;
        }
        ?>

    </main>

<?php include 'partials/footer.php' ?>