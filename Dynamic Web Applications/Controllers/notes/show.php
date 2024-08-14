<?php
$pageTitle = 'Note';

$config = require 'config.php';
$statement = new Database($config['database'], 'root', 'root');
$id = $_GET['id'];
$userId = 1;

$notesQuery = $statement->constructQuery('select * from notes where id = :id', [":id" => $id]);
$note = $notesQuery->findOrFail();

//if(!$note) {
//    abort();
//}
authorize($note['user_id'] === $userId, 403);


require "views/notes/show.view.php";