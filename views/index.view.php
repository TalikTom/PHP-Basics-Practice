<?php
require 'functions.php';

$columnPost = '';
$rowPost = '';
$valid = '';

function is_number($number, $number2, int $min = 2, int $max = 10): bool
{
    return (($number >= $min && $number <= $max)) && (($number2 >= $min && $number2 <= $max));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $columnPost = $_POST['column'];
    $rowPost = $_POST['row'];
    $valid = is_number($columnPost, $rowPost, 2, 10);
    $endRow = $rowPost - 1;
    $endColumn = $columnPost - 1;

    if ($valid) {
        $message = 'Number is valid';

    } else {
        $message = 'Number has to be between 2 and 10';
    }


}

$beginningPoint = $_POST['beginningPoint'] ?? 0;
//$columnPost = $_POST['column'] ?? 0;
//$rowPost = $_POST['row'] ?? 0;
$direction = $_POST['direction'] ?? 0;
$matrix = [];
$beginningRow = 0;
$beginningColumn = 0;
$val = 1;
$options = ['top-right', 'top-left', 'bottom-right', 'bottom-left'];

?>
<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>

<div class="main_container">
    <div class="main_content">

        <h1>Spiral matrix</h1>

        <div class="wrapper">
            <form action="/" method="POST">
                <label for="row" id="row">Enter row value</label>
                <input type="number" value="<?= htmlspecialchars($rowPost) ?>" name="row"
                       placeholder="2-10">

                <label for="column" id="column">Enter column value</label>
                <input type="number" value="<?= htmlspecialchars($columnPost) ?>"
                       name="column" placeholder="2-10"
                >

                <label for="beginningPoint">Beginning point</label>
                <select name="beginningPoint" id="beginningPoint">
                    <option value="top-right" <?php if (isset($beginningPoint) && $beginningPoint && $_POST['beginningPoint'] == 'top-right') echo 'selected="selected"' ?>>
                        Top-right
                    </option>
                    <option value="top-left" <?php if (isset($beginningPoint) && $beginningPoint && $_POST['beginningPoint'] == 'top-left') echo 'selected="selected"' ?>>
                        Top-left
                    </option>
                    <option value="bottom-right" <?php if (isset($beginningPoint) && $beginningPoint && $_POST['beginningPoint'] == 'bottom-right') echo 'selected="selected"' ?>>
                        Bottom-right
                    </option>
                    <option value="bottom-left" <?php if (isset($beginningPoint) && $beginningPoint && $_POST['beginningPoint'] == 'bottom-left') echo 'selected="selected"' ?>>
                        Bottom-left
                    </option>
                </select>
                <label for="direction">Choose direction</label>
                <select name="direction" id="direction">
                    <option value="clockf" <?php if (isset($direction) && $beginningPoint && $_POST['direction'] == 'clockf') echo 'selected="selected"' ?>>
                        Clockwise
                    </option>
                    <option value="clockr" <?php if (isset($direction) && $beginningPoint && $_POST['direction'] == 'clockr') echo 'selected="selected"' ?>>
                        Counterclockwise
                    </option>
                </select>


                <input type="submit" class="btn">


            </form>

            <?php


            if ($beginningPoint === 'bottom-right' && $direction === 'clockf' && $valid === true) {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                        if ($i === $columnPost - 1) {
                            $matrix[$endRow][$i] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }

                    }
                    $endRow--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }


                    for ($i = $endRow; $i >= $beginningRow; $i--) {

                        $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                    }

                    $beginningColumn++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                        $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                    }
                    $beginningRow++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $beginningRow; $i <= $endRow; $i++) {

                        $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                    }
                    $endColumn--;


                }
            } else {
                echo '<p>' . $message . '</p>';
            }

            if ($beginningPoint === 'bottom-right' && $direction === 'clockr') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $endRow; $i >= $beginningRow; $i--) {
                        if ($i === $rowPost - 1) {
                            $matrix[$i][$endColumn] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }

                    }
                    $endColumn--;


                    if ($val > $rowPost * $columnPost) {
                        break;
                    }


                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {

                        $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                    }

                    $beginningRow++;
//
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $beginningRow; $i <= $endRow; $i++) {

                        $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                    }
                    $beginningColumn++;
//
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                        $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                    }
                    $endRow--;


                }
            }


            if ($beginningPoint === 'bottom-left' && $direction === 'clockr') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                        if ($i === 0) {
                            $matrix[$endRow][$i] = '<td class= "beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }


                    }
                    $endRow--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $endRow; $i >= $beginningRow; $i--) {
                        $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endColumn--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                        $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningRow++;
////
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $beginningRow; $i <= $endRow; $i++) {
                        $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningColumn++;


                }
            }

            if ($beginningPoint === 'bottom-left' && $direction === 'clockf') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $endRow; $i >= $beginningRow; $i--) {
                        if ($i === $rowPost - 1) {
                            $matrix[$i][$beginningColumn] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                    }
                    $beginningColumn++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }


                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                        $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningRow++;
//
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $beginningRow; $i <= $endRow; $i++) {

                        $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endColumn--;
//
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {

                        $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endRow--;


                }
            }

            if ($beginningPoint === 'top-right' && $direction === 'clockr') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                        if ($i === $columnPost - 1) {
                            $matrix[$beginningRow][$i] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                    }
                    $beginningRow++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }


                    for ($i = $beginningRow; $i <= $endRow; $i++) {

                        $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningColumn++;
//
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                        $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endRow--;
//
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $endRow; $i >= $beginningRow; $i--) {

                        $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endColumn--;


                }
            }

            if ($beginningPoint === 'top-right' && $direction === 'clockf') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $endRow; $i >= $beginningRow; $i--) {
                        if ($i === $rowPost - 1) {
                            $matrix[$i][$endColumn] = '<td class= "beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }


                    }
                    $endColumn--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                        $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningRow++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
////
                    for ($i = $beginningRow; $i <= $endRow; $i++) {
                        $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningColumn++;
////
                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                        $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endRow--;


                }
            }


            if ($beginningPoint === 'top-left' && $direction === 'clockf') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                        if ($i === 0) {
                            $matrix[$beginningRow][$i] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                    }
                    $beginningRow++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

//
                    for ($i = $beginningRow; $i <= $endRow; $i++) {
                        $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endColumn--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                        $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endRow--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }

                    for ($i = $endRow; $i >= $beginningRow; $i--) {
                        $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningColumn++;


                }

            }

            if ($beginningPoint === 'top-left' && $direction === 'clockr') {
                while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                    for ($i = $beginningRow; $i <= $endRow; $i++) {
                        if ($i === 0) {
                            $matrix[$i][$beginningColumn] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        } else {
                            $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                    }
                    $beginningColumn++;


                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
//
                    for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                        $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endRow--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $endRow; $i >= $beginningRow; $i--) {
                        $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $endColumn--;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }
//
                    for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                        $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                    }
                    $beginningRow++;

                    if ($val > $rowPost * $columnPost) {
                        break;
                    }


                }
            }
            if ($valid) {

                echo '<table>';

                for ($i = 0; $i < $rowPost; $i++) {

                    echo '<tr>';

                    for ($j = 0; $j < $columnPost; $j++) {
                        echo $matrix[$i][$j];

                    }

                    echo '</tr>';

                }

                echo '</table>';
            }


            ?>
        </div>

    </div>
</div>

<?php

?>

<?php include 'includes/footer.php'; ?>
</body>
<script src="../script.js"></script>
</html>