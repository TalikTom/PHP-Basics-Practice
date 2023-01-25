<?php

$config = require('config.php');

$db = new Database($config['database']);

$notes = [1,2,3];

//$notes = $db ->query('select * from notes')->fetchAll();




require 'views/notes.view.php';