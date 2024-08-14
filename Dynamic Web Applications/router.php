<?php
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => "Controllers/index.php",
    '/about' => "Controllers/about.php",
    '/contact' => "Controllers/contact.php",
    '/notes' => "Controllers/notes.php",
    '/note' => "Controllers/note.php",
];

function abort($statusCode = 404)
{
    http_response_code($statusCode);
    require "views/{$statusCode}.view.php";
    exit;
}

array_key_exists($path, $routes) ? require $routes[$path]: abort(404);