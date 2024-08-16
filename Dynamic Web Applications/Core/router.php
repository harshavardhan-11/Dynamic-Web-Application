<?php

namespace Core;


$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');

function abort($statusCode = 404)
{
    http_response_code($statusCode);
    require base_path("views/{$statusCode}.view.php");
    exit;
}

array_key_exists($path, $routes) ? require base_path($routes[$path]): abort(404);