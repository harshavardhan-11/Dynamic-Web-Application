<?php

use Core\{App, Database};

$statement = App::resolve(Database::class);
$id = 1;

$notesQuery = $statement->constructQuery('select * from notes where user_id = :id', [":id" => $id]);
$notes = $notesQuery->get();

view("notes/index.view.php", [
    'notes' => $notes,
    'pageTitle' => 'Notes',
]);