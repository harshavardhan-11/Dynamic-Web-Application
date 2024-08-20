<?php

use Core\{App, Validator, Database, Session};

$db = App::resolve(Database::class);

$email = Session::get('user')['email'];

$user = $db->constructQuery('select * from users where email = :email', [
    'email' => $email
])->find();
$note = "";
$error = [];

$note = $_POST['note'];


if(Validator::string($note, 10, 1000)) {
    $error['body'] = 'Note should be between 10 and 1000 characters';
}

if(!empty($error)) {
    view("notes/create.view.php", [
        'note' => $note,
        'pageTitle' => 'Create Note',
        'error' => $error
    ]);
}

$db->constructQuery('INSERT INTO notes(body, user_id) VALUES(:note, :user_id)', ['note' => $note, "user_id" => $user['id']]);

header('location: /notes');
die();

