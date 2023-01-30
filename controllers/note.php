<?php

$config = require('config.php');

$db = new Database($config['database']);

$currentUserId = 1;

$note = $db ->query('select * from notes where note_id = :id', ['id' => $_GET['note_id']])->findOrAbort();


authorize($note['user_id'] == $currentUserId);



require 'views/note.view.php';

