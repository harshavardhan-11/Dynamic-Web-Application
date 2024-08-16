<?php

//use Core\{Database, Validator};
//
//$config = require base_path('config.php');
//require base_path('Core/Validator.php');
//
//
//$statement = new Database($config['database'], 'root', 'root');
//
//$user_id = 1; //hard code for now
//$note = "";
//$error = [];
//if($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $note = $_POST['note'];
//
//
//    if(Validator::string($note, 10, 1000)) {
//        $error['body'] = 'Note should be between 10 and 1000 characters';
//    }
//    if(!count($error)) {
//        $statement->constructQuery('INSERT INTO notes(body, user_id) VALUES(:note, :user_id)', ['note' => $note, "user_id" => $user_id]);
//    }
//}

view("notes/create.view.php", [
    'pageTitle' => 'Create Note',
    'errors' => []
]);