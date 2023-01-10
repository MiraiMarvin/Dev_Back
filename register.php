<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="dist/style.css" rel="stylesheet">
    <title>login</title>
</head>
<body>
<?php include('header.php'); ?>
<section class="container">
    <div class="box_log">
        <form method="POST" class="flex flex-col font-Bahn">
            <h2 class="font-Akira">Inscrivez Vous</h2>
        <input type="text" name="email" id="log-email" placeholder="mail" class="bg-transparent">
        <input type="text" name="password" id="log-pass" placeholder="password" class="bg-transparent">
        <input type="text" name="username" id="log-user" placeholder="username" class="bg-transparent">
        <input type="text" name="last_name" id="log-Lname" placeholder="last name" class="bg-transparent">
        <input type="text" name="bio" id="log-bio" placeholder="biographie" class="bg-transparent">
        <input type="submit" value="register" class="btn btn-primary">
        </form>
        <a href="login.php">login</a>
    </div>
</section>
<?php

require_once 'user.php';
require_once 'connection.php';

if ($_POST) {
    $user = new User(
        $_POST['email'],
        $_POST['password'],
        $_POST['username'],
        $_POST['last_name'],
        $_POST['bio'],
    );

    if ($user->verify()) {
        // save to database
        $connection = new Connection();
        $result = $connection->insert($user);

        if ($result) {
            echo 'Registered with success!';
        } else {
            echo ' error ';
        }
    } else {
        echo 'Form has an error';
    }


}

?>
</body>
</html>