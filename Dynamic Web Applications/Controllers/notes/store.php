<?php

use Core\{Database, Validator};

$config = require base_path('config.php');
require base_path('Core/Validator.php');


$statement = new Database($config['database'], 'root', 'root');

$user_id = 1; //hard code for now
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

$statement->constructQuery('INSERT INTO notes(body, user_id) VALUES(:note, :user_id)', ['note' => $note, "user_id" => $user_id]);

header('location: /notes');
die();

