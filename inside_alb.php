<?php
session_start();
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
    <title>SpyMovies</title>
</head>
<body class="bg-black">
<section class="w-full h-screen " >
    <div class="flex flex-row justify-between h-20 items-center">
        <h1 class="text-white font-Akira text-5xl px-5">SpyMovies</h1>
        <div class="font-Bahn text-2xl font-medium flex flex-row">
            <a class="text-white px-2.5" href="login.php">Log In</a>
            <a class="text-white px-2.5" href="register.php">Register</a>

            <?php
            if(isset($_SESSION['email']))
            {
                echo '<img src="./image/Arcane.png" alt="profil-image" id="image-pp">';
                echo'<a href="disco.php" class="text-white px-2.5">log out</a>';
            }
            ?>
            <script>
                var id = <?php echo $id_json; ?>;
            </script>
        </div>
    </div>
</section>
<section>
    <div>
        <?php
        $album_id = $_GET['albid'];
        $connection = new Connection();
        $resultall = $connection->getAllFilm($album_id);

        $maVariableJSON = json_encode($resultall);


        ?>
        <script>
            var maVariableJS = <?php echo $maVariableJSON; ?>;
            console.log(maVariableJS)
        </script>

    </div>
</section>
</body>
</html>