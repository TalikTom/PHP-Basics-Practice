<?php
declare(strict_types=1);
require 'Database.php';



// connect to the database, execute a query

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

$query = "select * from notes where user_id = :id";

$notes = $db->query($query, [':id' => $id])->fetchAll(PDO::FETCH_ASSOC);




foreach ($notes as $note) {
    echo '<li>' . $note['body'] . '</li';
}
require 'router.php';


