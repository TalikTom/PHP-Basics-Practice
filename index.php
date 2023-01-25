<?php

declare(strict_types=1);

// connect to the database, execute a query

class Database {

    public $connection;

    public function __construct() {
        $dsn = "mysql:host=localhost;port=3306;dbname=postit;user=root;charset=utf8mb4";
        $this->connection = new PDO($dsn);

    }

    public function query($query)

    {
        $statement = $this -> connection ->prepare("$query");
        $statement -> execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}


$db = new Database();

$notes = $db->query("select * from notes where user_id = 1");




foreach ($notes as $note) {
    echo '<li>' . $note['body'] . '</li';
}
require 'router.php';


