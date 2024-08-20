<?php

use Core\{App, Session, Database};

$db = App::resolve(Database::class);

$email = Session::get('user')['email'];

$user = $db->constructQuery('select * from users where email = :email', [
    'email' => $email
])->find();

$note = $db->constructQuery('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $user['id'], 403);

view("notes/edit.view.php", [
    'pageTitle' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);