<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note
$note = $db->constructQuery('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId, 403);

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 10)) {
    $errors['body'] = 'Note should be between 10 and 1000 characters';
}

// if no validation errors, update the record in the notes database table.
if(!empty($error)) {
    view("notes/create.view.php", [
        'note' => $note,
        'pageTitle' => 'Edit Note',
        'error' => $error
    ]);
}

$db->constructQuery('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();