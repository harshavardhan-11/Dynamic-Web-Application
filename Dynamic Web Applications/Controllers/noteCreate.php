<?php
$config = require 'config.php';
$statement = new Database($config['database'], 'root', 'root');

$pageTitle = 'Create Note';
$user_id = 1; //hard code for now

if($_SERVER['REQUEST_METHOD'] == 'POST') {
//    var_dump($_POST);
    $statement->constructQuery('INSERT INTO notes(body, user_id) VALUES(:note, :user_id)', ['note' => $_POST['note'], "user_id" => $user_id]);
}

require "views/noteCreate.view.php";