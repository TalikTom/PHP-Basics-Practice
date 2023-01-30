<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (($_POST['quantity']) == 0) {
        $errors['quantity'] = 'Please enter larger value then 0';
    }

    if (! is_numeric($_POST['quantity'])) {
        $errors['quantity'] = 'Please enter numerical value';
    }

    $quantity = (int)$_POST['quantity'];

}


require 'views/oib.view.php';