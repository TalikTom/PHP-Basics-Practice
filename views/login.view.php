<?php

include 'controllers/login.php';

if ($logged_in) {
    header('Location: cookies.view.php');
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if ($user_email == $email and $user_password = $password) {
        login();
        header('Location: cookies.view.php');
        exit;
    }
}