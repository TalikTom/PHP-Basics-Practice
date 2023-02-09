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

?>

<h1>Login</h1>
<form action="#" METHOD="POST">
    Email: <input type= "email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Log in">
</form>
