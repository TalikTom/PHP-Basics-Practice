<?php

require 'Validator.php';

$config = require('config.php');

$db = new Database($config['database']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];



    if (! Validator::string($_POST['body'], 1, 140)) {
        $errors['body'] = 'Please write a note of max. 140 characters count';
    }


    if (empty($errors)) {
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)',
            [
                'body' => $_POST['body'],
                'user_id' => 1
            ]);
    }


}

require 'views/notes/create.view.php';