<?php
require 'functions.php';

$input = ['column' => '', 'row' => '',];
$errors = ['column' => '', 'row' => '',];

$message = '';
$invalid = '';

//function is_number($number, $number2, int $min = 2, int $max = 10): bool
//{
//    return (($number >= $min && $number <= $max)) && (($number2 >= $min && $number2 <= $max));
//}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $input['column = $_POST['column'];
//    $input['row = $_POST['row'];
//    $valid = is_number((int)$input['column, (int)$input['row, 2, 10);
    $validation_filters['column']['filter'] = FILTER_VALIDATE_INT;
    $validation_filters['row']['filter'] = FILTER_VALIDATE_INT;
    $validation_filters['column']['options']['min_range'] = 2;
    $validation_filters['column']['options']['max_range'] = 10;
    $validation_filters['row']['options']['min_range'] = 2;
    $validation_filters['row']['options']['max_range'] = 10;


    $input = filter_input_array(INPUT_POST, $validation_filters);


    //errors messages

    $errors['column'] = $input['column'] ? '' : 'Only numbers 2 to 10 are allowed';
    $errors['row'] = $input['row'] ? '' : 'Only numbers 2 to 10 are allowed';
    $invalid = implode($errors);

    if ($invalid) {
        $message = 'Please correct the following errors:';
    } else {
        $message = 'Thank you, your data was valid';
        $endRow = $input['row'] - 1;
        $endColumn = $input['column'] - 1;
    }

    //sanitize data

    $input['column'] = filter_var($input['column'], FILTER_SANITIZE_NUMBER_INT);
    $input['row'] = filter_var($input['row'], FILTER_SANITIZE_NUMBER_INT);
//    if (!$valid) {
//        $message = 'Number has to be between 2 and 10';
//    }




}

$beginningPoint = $_POST['beginningPoint'] ?? 0;
//$input['column = $_POST['column'] ?? 0;
//$input['row = $_POST['row'] ?? 0;

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
        <?= $message; ?>
        <div class="wrapper">
            <form action="/" method="POST">
                <label for="row" id="row">Enter row value</label>
                <input type="number" value="<?= $input['row'] ?>" name="row"
                       placeholder="2-10">
                <span class="warning "><?= $errors['row'] ?></span>
                <label for="column" id="column">Enter column value</label>
                <input type="number" value="<?= $input['column'] ?>"
                       name="column" placeholder="2-10"
                >
                <span class="warning "><?= $errors['column'] ?></span>

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

            if(!$invalid) {

                if ($beginningPoint === 'bottom-right' && $direction === 'clockf') {
                    while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                            if ($i === $input['column'] - 1) {
                                $matrix[$endRow][$i] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            } else {
                                $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            }

                        }
                        $endRow--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }


                        for ($i = $endRow; $i >= $beginningRow; $i--) {

                            $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                        }

                        $beginningColumn++;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }

                        for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                            $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                        }
                        $beginningRow++;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }

                        for ($i = $beginningRow; $i <= $endRow; $i++) {

                            $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                        }
                        $endColumn--;


                    }
                }

                if ($beginningPoint === 'bottom-right' && $direction === 'clockr') {
                    while ($beginningRow <= $endRow && $beginningColumn <= $endColumn) {


                        for ($i = $endRow; $i >= $beginningRow; $i--) {
                            if ($i === $input['row'] - 1) {
                                $matrix[$i][$endColumn] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            } else {
                                $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            }

                        }
                        $endColumn--;


                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }


                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {

                            $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                        }

                        $beginningRow++;
//
                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $beginningRow; $i <= $endRow; $i++) {

                            $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';

                        }
                        $beginningColumn++;
//
                        if ($val > $input['row'] * $input['column']) {
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

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $endRow; $i >= $beginningRow; $i--) {
                            $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endColumn--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                            $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningRow++;
////
                        if ($val > $input['row'] * $input['column']) {
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
                            if ($i === $input['row'] - 1) {
                                $matrix[$i][$beginningColumn] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            } else {
                                $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            }
                        }
                        $beginningColumn++;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }


                        for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                            $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningRow++;
//
                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $beginningRow; $i <= $endRow; $i++) {

                            $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endColumn--;
//
                        if ($val > $input['row'] * $input['column']) {
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
                            if ($i === $input['column'] - 1) {
                                $matrix[$beginningRow][$i] = '<td class="beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            } else {
                                $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            }
                        }
                        $beginningRow++;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }


                        for ($i = $beginningRow; $i <= $endRow; $i++) {

                            $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningColumn++;
//
                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }

                        for ($i = $beginningColumn; $i <= $endColumn; $i++) {

                            $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endRow--;
//
                        if ($val > $input['row'] * $input['column']) {
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
                            if ($i === $input['row'] - 1) {
                                $matrix[$i][$endColumn] = '<td class= "beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            } else {
                                $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            }


                        }
                        $endColumn--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                            $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningRow++;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
////
                        for ($i = $beginningRow; $i <= $endRow; $i++) {
                            $matrix[$i][$beginningColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningColumn++;
////
                        if ($val > $input['row'] * $input['column']) {
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

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }

//
                        for ($i = $beginningRow; $i <= $endRow; $i++) {
                            $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endColumn--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }

                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                            $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endRow--;

                        if ($val > $input['row'] * $input['column']) {
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


                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
//
                        for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                            $matrix[$endRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endRow--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $endRow; $i >= $beginningRow; $i--) {
                            $matrix[$i][$endColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endColumn--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//
                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                            $matrix[$beginningRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningRow++;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }


                    }
                }

            } else {
                echo 'Please correct the errors';
            }

            if (!$invalid) {

                echo '<table>';

                for ($i = 0; $i < $input['row']; $i++) {

                    echo '<tr>';

                    for ($j = 0; $j < $input['column']; $j++) {
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

<?php include 'partials/footer.php'?>


