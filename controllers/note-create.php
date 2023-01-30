<?php

require  'Validator.php';

$config = require('config.php');

$db = new Database($config['database']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $validator = new Validator();

    if ($validator->string($_POST['body'])) {
        $errors['body'] = 'Your note is empty, please add text';
    }

    if (strlen($_POST['body']) > 140) {
        $errors['body'] = 'Your text can be max. 140 characters count';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)',
            [
                'body' => $_POST['body'],
                'user_id' => 1
            ]);
    }


}

require 'views/note-create.view.php';