<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (count($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors,
    ]);
    exit;
}

$user = $db->constructQuery('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->constructQuery('INSERT INTO users(email, password, name) VALUES(:email, :password, :name)', [
        'email' => $email,
        'password' => $password, // NEVER store database passwords in clear text. We'll fix this in the login form episode. :)
        'name' => $name
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}