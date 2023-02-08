<?php
session_start();
$logged_in = $_SESSION['logged_in'] ?? false;

$email = 'luka@gmail.com';
$password = 'password';

function login() {

    session_regenerate_id(true);
    $_SESSION['logged_in'] = true;

}