<?php
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require('routes.php');

function abort($statusCode = 404)
{
    http_response_code($statusCode);
    require "views/{$statusCode}.view.php";
    exit;
}

array_key_exists($path, $routes) ? require $routes[$path]: abort(404);