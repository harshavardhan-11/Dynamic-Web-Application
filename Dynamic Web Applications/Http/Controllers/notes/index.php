<?php

use Core\{App, Database, Session};

$db = App::resolve(Database::class);
$email = Session::get('user')['email'];

$user = $db->constructQuery('select * from users where email = :email', [
    'email' => $email
])->find();

$notesQuery = $db->constructQuery('select * from notes where user_id = :id', [":id" => $user['id']]);
$notes = $notesQuery->get();

view("notes/index.view.php", [
    'notes' => $notes,
    'pageTitle' => 'Notes',
]);