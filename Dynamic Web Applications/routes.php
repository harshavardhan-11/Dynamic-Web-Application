<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->delete('/note', 'notes/destroy.php');
$router->post('/notes', 'notes/store.php');

$router->post('/register', 'session/store.php')->only('guest');
$router->get('/register', 'session/create.php')->only('guest');


$router->get('/login', 'session/login.php')->only('guest');
$router->post('/session', 'session/session.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');