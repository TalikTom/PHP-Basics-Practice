<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =
    [
        '/' => 'controllers/index.php',
        '/cookies' => 'controllers/cookies.php',
        '/multiplication' => 'controllers/multiplication.php',
        '/chart' => 'controllers/chart.php',
        '/notes' => 'controllers/notes.php',
        '/oib' => 'controllers/oib.php'
    ];

if (array_key_exists($uri, $routes))
{
    require $routes[$uri];
} else {
    http_response_code(404);

    require 'views/404.php';

    die();
}