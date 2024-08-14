<?php
$config = require 'config.php';
require 'Validator.php';


$statement = new Database($config['database'], 'root', 'root');

$pageTitle = 'Create Note';
$user_id = 1; //hard code for now

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $_POST['note'];
    $error = [];

    if(Validator::string($note, 10, 1000)) {
        $error['body'] = 'Note should be between 10 and 1000 characters';
    }
    if(!count($error)) {
        $statement->constructQuery('INSERT INTO notes(body, user_id) VALUES(:note, :user_id)', ['note' => $note, "user_id" => $user_id]);
    }
}

require "views/notes/create.view.php";