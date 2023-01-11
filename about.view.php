<?php
include 'includes/header.php';
include 'includes/footer.php';

$broj1 = isset($_GET['broj1']) ? $_GET['broj1'] : 0;
$broj2 = isset($_GET['broj2']) ? $_GET['broj2'] : 0;
$broj3 = isset($_GET['broj3']) ? $_GET['broj3'] : 0;

if ($broj1 < $broj2 && $broj1 < $broj3) {
    echo 'Broj1' . '(' . $broj1 . ')' . ' je najmanji broj';
} else if  ($broj2 < $broj1 && $broj2 < $broj3) {
    echo 'Broj2' . '(' . $broj2 . ')' . ' je najmanji broj';
} else if ($broj3 < $broj1 && $broj3 < $broj2) {
    echo 'Broj3' . '(' . $broj3 . ')' . ' je najmanji broj';
} else {
    echo 'all numbers are equal in value';
}
