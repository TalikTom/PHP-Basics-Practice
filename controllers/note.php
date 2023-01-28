<?php

$config = require('config.php');

$db = new Database($config['database']);


$notes = $db ->query('select * from notes where user_id = :id', ['id' => $_GET['user_id']])->fetchAll();




require 'views/notes.view.php';