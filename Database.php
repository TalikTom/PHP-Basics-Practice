<?php

class Database
{

    public $connection;

    public function __construct()
    {

        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'postit',
            'charset' => 'utf8mb4'
        ];

        http_build_query($config, '', ';');

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    }

    public function query($query)

    {
        $statement = $this->connection->prepare("$query");
        $statement->execute();
        return $statement;
    }
}

?>