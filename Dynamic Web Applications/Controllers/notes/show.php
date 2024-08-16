<?php

use Core\Database;

$config = require base_path('config.php');
$statement = new Database($config['database'], 'root', 'root');
$id = $_GET['id'];
$userId = 1;

$notesQuery = $statement->constructQuery('select * from notes where id = :id', [":id" => $id]);
$note = $notesQuery->findOrFail();

authorize($note['user_id'] === $userId, 403);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $statement->constructQuery('DELETE FROM notes WHERE id = :id;', [":id" => $id]);

    header("location: /notes");
}


view("notes/show.view.php", [
    'note' => $note,
    'pageTitle' => 'Create Note',
]);