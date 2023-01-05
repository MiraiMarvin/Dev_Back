<?php
session_start();
var_dump($_SESSION);

require_once 'connection.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="dist/style.css" rel="stylesheet">
    <title>Profil</title>
</head>
<body class=" bg-black">
<section class="" >
    <div class="flex flex-row justify-between h-20 items-center">
        <h1 class="text-white font-Akira text-5xl px-5">SpyMovies</h1>
        <div class="font-Bahn text-2xl font-medium">
            <a class="text-white px-2.5" href="login.php">Log In</a>
            <a class="text-white px-2.5" href="register.php">Register</a>
            <?php
            if(isset($_SESSION['email']))
            {
                echo'<a href="disco.php" class="text-white px-2.5">log out</a>';
            }
            ?>
        </div>
    </div>
</section>
<section class="w-screen h-screen">
    <div class="w-1/6 h-5/6 bg-white">
        1
    </div> 
</section>
</body>
</html>