<?php include 'partials/header.php'; ?>
<?php include 'partials/nav.php'; ?>

<div class="main_container ">
    <div class="container">

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


                        for ($i = $beginningRow; $i <= $endRow; $i++) {
                            if ($i === 0) {
                                $matrix[$i][$endColumn] = '<td class= "beginning" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            } else {
                                $matrix[$i][$endColumn] = '<td class="top" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                            }


                        }
                        $endColumn--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
////
                        for ($i = $endColumn; $i >= $beginningColumn; $i--) {
                            $matrix[$endRow][$i] = '<td class="right" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $endRow--;

                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
//////
                        for ($i = $endRow; $i >= $beginningRow; $i--) {
                            $matrix[$i][$beginningColumn] = '<td class="bottom" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningColumn++;
////
                        if ($val > $input['row'] * $input['column']) {
                            break;
                        }
////
                        for ($i = $beginningColumn; $i <= $endColumn; $i++) {
                            $matrix[$beginningRow][$i] = '<td class="left" style="animation-delay:' . ($val) * 35 . 'ms;">' . $val++ . '</td>';
                        }
                        $beginningRow++;


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


