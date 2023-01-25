<?php

declare(strict_types=1);

// connect to the database, execute a query

class Database {
    public function query()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=postit;user=root;charset=utf8mb4";
        $pdo = new PDO($dsn);

        $statement = $pdo ->prepare("select * from notes");
        $statement -> execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}


$db = new Database();

$notes = $db->query();




foreach ($notes as $note) {
    echo '<li>' . $note['body'] . '</li';
}
require 'router.php';


