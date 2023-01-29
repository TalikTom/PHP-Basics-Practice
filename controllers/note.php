<?php

$config = require('config.php');

$db = new Database($config['database']);

$currentUserId = 1;

$note = $db ->query('select * from notes where user_id = :id', ['id' => $_GET['user_id']])->findOrAbort();

echo $note['user_id'];
echo $currentUserId;
authorize($note['user_id'] == $currentUserId);



require 'views/note.view.php';