<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->constructQuery('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId, 403);

view("notes/edit.view.php", [
    'pageTitle' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);