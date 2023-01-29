<?php

$routes = require('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



if (array_key_exists($uri, $routes))
{
    require $routes[$uri];
} else {
    http_response_code(404);

    require 'views/404.php';

    die();
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}


function base_path($path)
{
    return $_SERVER['DOCUMENT_ROOT'] . '/' .$path;
}
