<?php

use Core\{App, Database, Session};

$db = App::resolve(Database::class);
$id = $_GET['id'];
$email = Session::get('user')['email'];

$user = $db->constructQuery('select * from users where email = :email', [
    'email' => $email
])->find();

$notesQuery = $db->constructQuery('select * from notes where id = :id', [":id" => $id]);
$note = $notesQuery->findOrFail();

authorize($note['user_id'] === $user['id'], 403);

$db->constructQuery('DELETE FROM notes WHERE id = :id;', [":id" => $id]);

header("location: /notes");