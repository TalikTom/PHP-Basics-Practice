<?php require 'functions.php'; ?>
<?php

$config = require('config.php');

$db = new Database($config['database']);


$note = $db ->query('select * from notes where user_id = :id', ['id' => $_GET['user_id']])->fetchAll();

if(!$note) {
    abort(404);
}




require 'views/note.view.php';