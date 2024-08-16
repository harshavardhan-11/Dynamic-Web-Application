<?php

use Core\Database;

$config = require base_path('Core/config.php');
$statement = new Database($config['database'], 'root', 'root');
$id = 1;

$notesQuery = $statement->constructQuery('select * from notes where user_id = :id', [":id" => $id]);
$notes = $notesQuery->get();

view("notes/index.view.php", [
    'notes' => $notes,
    'pageTitle' => 'Notes',
]);