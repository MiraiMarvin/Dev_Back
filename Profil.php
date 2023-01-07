<?php
session_start();

require_once 'connection.php';
require_once 'Profil_extract.php';

$user_id=$_SESSION['id'];
$connection = new Connection();
$result = $connection->getAllUser($user_id);

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
    <div class=" flex flex-col">
        <div class="flex flex-row space-evenly items-center gap-8">
            <img src="./image/Arcane.png" alt="PP" class="rounded-full w-96 h-auto">
            <div>
                <?php
                $user_id=$_SESSION['id'];
                $connection = new Connection();
                $result = $connection->getAllUser($user_id);

                foreach($result as $info) { ?>
                    <div class="avis_box">
                        <h3 class="text-2xl text-white font-Akira"><?= $info['username'] ?></h3>
                        <div class="font-Bahn text-white text-xl"><?= $info['bio'] ?></div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <p class="text-white font-Akira">Creer votre album</p>
                <form method="POST" class=" flex flex-col gap-8 font-Bahn  bg-transparent w-1/4 h-3/4">
                    <input type="text" name="titre" id="album_title" placeholder="titre" class="border-white border-2 bg-transparent ">
                    <label>
                        <input type="checkbox" name="private" value="1">
                        private

                    </label>
                    <input type="submit" value="register" class="btn btn-primary">
                </form>
            <?php

            require_once 'Album.php';
            require_once 'connection.php';
            if ($_POST) {
                $album = new album(
                    $_POST['titre'],
                    $_POST['private'],
                    $_SESSION['id'],
                );

                if ($album->verifyAlbum()) {
                    // save to database
                    $connection = new Connection();
                    $result = $connection->insertAl($album);

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
        </div>
    </div>


</section>
<script src="modal.js" ></script>
</body>
</html>