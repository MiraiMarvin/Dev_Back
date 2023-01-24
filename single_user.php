<?php
session_start();
require_once 'Album.php';
require_once 'connection.php';
require_once 'album_share.php';
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
<body class="">
<?php include('header.php'); ?>
<section class="w-screen  ">
    <div class=" flex flex-col items-center mt-24 ">
        <div class="flex flex-row space-evenly items-center gap-8 mb-20 border-white border-b-2 w-3/4">
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
                <div>
                    <?php
                    $allalb = $_SESSION['id'];
                    $connection = new Connection();
                    $resultat = $connection->getAllAlbum($allalb);
                    ?>
                    <p class="text-white font-Bahn">partagez un album</p>
                    <form method="POST">
                        <select name="mon_select"  class="border-2 border-white bg-transparent text-white">
                            <?php
                            foreach ($resultat as $element) {
                                echo '<option name="choose" value="' . $element['id'] . '">' . $element['title'] . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" value="register" class="text-white">
                    </form>
                        <?php
                        if ($_POST) {
                            $album_share = new album_share(
                                $_GET['item'],
                                $_SESSION['id'],
                                $_POST['mon_select'],

                            );
                            $connection = new Connection();
                            $allalbum_share = $connection->insertAl_SH($album_share);

                            if ($result) {
                                echo 'invitation envoyée';
                            } else {
                                echo ' error ';
                            }
                        } else {
                            echo 'Form has an error';
                        }

                        ?>

                    </form>
                </div>
            </div>

        </div>
        <h2 class="text-white font-Akira">ses albums publique</h2>
        <div class="flex flex-wrap gap-8">
            <?php
            $user_id = $_GET['item'];
            $connection = new Connection();
            $result = $connection->getAllAlbumpublic($user_id);


            foreach($result as $alb) { ?>
                <p class="hidden"><?=$url = "inside_albpublic.php?albid=" . $alb['id'] ;?></p>
                <div class="border-white border-2 w-40 h-56 flex flex-wrap gap-8 mt-24 flex flex-col place-items-start">
                    <form method="post" action="<?=$url?>" >
                        <h2 class="text-white text-l font-Bahn"><?= $alb['title']?></h2>
                        <button name="submit" type="submit" class="text-white font-Bahn">voir</button>
                    </form>
                </div>
            <?php } ?>
        </div>
        <h2 class="text-white font-Akira">ses albums partages</h2>
        <div class="flex flex-wrap gap-8">
            <?php
            $user_id = $_GET['item'];
            $connection = new Connection();
            $result = $connection->getAllAlbumShare($user_id);

            foreach($result as $alb) { ?>
                <p class="hidden"><?=$url = "inside_albpublic.php?albid=" . $alb['id'] ;?></p>
                <div class="border-white border-2 w-40 h-56 flex flex-wrap gap-8 mt-24 flex flex-col place-items-start">
                    <form method="post" action="<?=$url?>" >
                        <h2 class="text-white text-l font-Bahn"><?= $alb['title']?></h2>
                        <button name="submit" type="submit" class="text-white font-Bahn">voir</button>
                    </form>
                </div>
            <?php } ?>
        </div>

    </div>


</section>
<script src="modal.js"></script
</body>
</html>