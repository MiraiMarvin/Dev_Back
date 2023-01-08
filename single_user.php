<?php
session_start();
require_once 'Album.php';
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
<?php include('header.php'); ?>
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
        <div class="flex flex-wrap gap-8">
            <?php
            $user_id = $_GET['item'];
            $connection = new Connection();
            $result = $connection->getAllAlbum($user_id);


            foreach($result as $alb) { ?>
                <div class="border-white border-2 w-32 h-32 flex flex-wrap gap-8 mt-24">
                    <h2 class="text-white text-l font-Bahn"><?= $alb['title']?></h2>

                </div>
            <?php } ?>
        </div>

    </div>


</section>
<script src="modal.js"></script
</body>
</html>