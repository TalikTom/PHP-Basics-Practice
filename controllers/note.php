<?php

$config = require('config.php');

$db = new Database($config['database']);

$currentUserId = 1;

$note = $db ->query('select * from notes where user_id = :id', ['id' => $_GET['user_id']])->findOrAbort();


authorize($note['user_id'] != $currentUserId);


if() {
    abort(RESPONSE::FORBIDDEN);
}


require 'views/note.view.php';