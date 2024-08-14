<?php

$pageTitle = 'Notes';

$config = require 'config.php';
$statement = new Database($config['database'], 'root', 'root');
$id = 1;

$notesQuery = $statement->constructQuery('select * from notes where user_id = :id', [":id" => $id]);
$notes = $notesQuery->get();
//var_dump($notes->fetchAll());

require "views/notes/index.view.php";