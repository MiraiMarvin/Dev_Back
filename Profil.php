<?php
session_start();

require_once 'connection.php';

$user_id = $_SESSION['id'];
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
<?php include('header.php'); ?>
<section class="w-screen h-screen">
    <div class=" flex flex-col">
        <div class="flex flex-row space-evenly items-center gap-8">
            <img src="./image/Arcane.png" alt="PP" class="rounded-full w-96 h-auto">
            <div>
                <?php
                $user_id = $_SESSION['id'];
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
        <div>
            <button id="myBtn" class="font-Bahn text-white mt-24">ajouter un album</button>
        </div>
        <div id="myModal" class="modalmain">
            <div class="modal">
                <span class="close">&times;</span>
                <p class="text-white font-Akira">Creer votre album</p>
                <form method="POST" class=" flex flex-col gap-8 font-Bahn  bg-transparent w-1/4 h-3/4">
                    <input type="text" name="titre" id="album_title" placeholder="titre" class="border-white border-2 bg-transparent ">
                    <label for="myBoolean">is private ?</label><br>
                    <select name="myBoolean" id="myBoolean">
                        <option value="1">publique</option>
                        <option value="0">privé</option>
                    </select>
                    <input type="submit" value="register" class="btn btn-primary">
                </form>
            <?php

            require_once 'Album.php';
            require_once 'connection.php';

            if (isset($_POST['myBoolean'])) {
                $myBoolean = boolval($_POST['myBoolean']);
                return $myBoolean;

            }
            


            $user_id = $_GET['id'];
            if ($_POST) {
                $album = new album(
                    $_POST['titre'],
                    $myBoolean,
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
        <div class="flex flex-wrap gap-8">
        <?php
        $user_id = $_SESSION['id'];
        $connection = new Connection();
        $result = $connection->getAllAlbum($user_id);


        foreach($result as $alb) { ?>
                <p class="hidden"><?=$url = "inside_alb.php?albid=" . $alb['id'] ;?></p>
            <div  class="border-white border-2 w-32 h-32 flex flex-wrap gap-8 mt-24">
                <form method="post" action="<?=$url?>" >
                <h2 class="text-white text-l font-Bahn"><?= $alb['title']?></h2>
                <button name="submit" type="submit" class="text-white font-Bahn">voir</button>
                </form>
            </div>

        <?php } ?>
        </div>



</section>
<section class="">

</section>
<script src="modal.js"></script
</body>
</html>