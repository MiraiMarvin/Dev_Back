<?php
session_start();
$id = $_SESSION['id'];
$id_json = json_encode($id);

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
<body class="">

<section class=" h-screen bg-[url('../image/bannerpromo.png')] bg-no-repeat bg-cover " >
    <div class="flex flex-row justify-between h-20 items-center">
        <h1 class=" font-Akira text-5xl px-5">SpyMovies</h1>
        <div class="font-Bahn text-2xl font-medium flex flex-row">
            <a class="px-2.5" href="login.php">Log In</a>
            <a class="px-2.5" href="register.php">Register</a>

            <?php
            if(isset($_SESSION['email']))
            {
                echo '<img src="./image/Arcane.png" alt="profil-image" id="image-pp">';
                echo'<a href="disco.php" class=" px-2.5">log out</a>';
            }
            ?>
            <script>
                var id = <?php echo $id_json; ?>;
            </script>
        </div>
    </div>
    <div class="navbutton flex flex-row  items-center text-center  ">
        <a class="button_nav font-Bahn px-8 py-2 m-auto mr-10" href="#discover">Discover</a>
        <a class="button_nav font-Bahn px-8 py-2 m-auto ml-10" href="#social">Founds friends</a>
    </div>
</section>
<section class="w-full ">
    <div class="items-center text-center my-16">
        <h2 class="font-Akira text-3xl  my-4">Movies</h2>
        <form id="search-form" class="">

            <input type="text" id="search-input" name="search" placeholder="search.." class="bg-transparent border border-white font-Bahn w-1/3 p-2" >
            <button type="submit" class="" id="search-button">Go</button>
        </form>
        <a href="searchgenre.php" id="discover" class="text-2xl font-Bahn">cherchez par genre</a>
    </div>
    <div class="flex flex-row w-full justify-evenly  ">
        <div class="w-9/12 flex flex-wrap gap-8 items-center text-center justify-evenly " id="right_search">


        </div>
    </div>

</section>
<section class="w-full items-center flex flex-col ">
    <h2 id="social" class=" font-Akira text-3xl">Social</h2>
    <h3 class=" font-Bahn text-xl">founds friends </h3>
    <div id="list_user" class="flex flex-col border-t-2 border-b-2 w-1/2 mb-40">
        <?php
        $connection = new Connection();
        $resultall = $connection->getReallyAllUser();


        foreach($resultall as $all) { ?>
                <p class="hidden"><?=$url = "single_user.php?item=" . $all['id'] ;?></p>

            <div class="flex flex-col  m-4 ">
                <h3 class="text-xl text-white font-Akira"><?= $all['username'] ?></h3>
                <div class="font-Bahn text-gray-500 text-l"><?= $all['last_name'] ?></div>
                <a href="<?=$url?>" class="text-white font-Bahn pt-4">voir</a>
            </div>
        <?php }?>

    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Axios-search.js" type="module"></script>
<script src="switch_profil.js" type="module"></script>

</body>
</html>