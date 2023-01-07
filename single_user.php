<?php
session_start();

require_once 'connection.php';
$id_foreign = $_GET['item'];
$connection = new Connection();
$result = $connection->getAllUser($id_foreign);

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
                $id_foreign = $_GET['item'];
                $connection = new Connection();
                $result = $connection->getAllUser($id_foreign);

                foreach($result as $info) { ?>
                    <div class="avis_box">
                        <h3 class="text-2xl text-white font-Akira"><?= $info['username'] ?></h3>
                        <div class="font-Bahn text-white text-xl"><?= $info['bio'] ?></div>
                    </div>
                <?php } ?>
            </div>

        </div>

    </div>


</section>
<script src="modal.js"></script
</body>
</html>