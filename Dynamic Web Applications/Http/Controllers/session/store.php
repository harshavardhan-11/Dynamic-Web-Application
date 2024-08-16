<?php

use Core\App;
use Core\Database;

use Core\Session;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$form = LoginForm::validate([
    'email' => $email,
    'password' => $password
]);


$user = $db->constructQuery('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->constructQuery('INSERT INTO users(email, password, name) VALUES(:email, :password, :name)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'name' => $name
    ]);

    login(['email' => $email, 'name' => $name]);

    header('location: /');
    exit();
}


//Session::flash('old', [
//    'email' => $email,
//    'name' => $name,
//]);
//
//Session::flash('errors', $form->errors());

//return redirect('/register');
