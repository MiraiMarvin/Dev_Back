<section class=" " >
    <div class="flex flex-row justify-between h-20 items-center">
        <h1  class="text-white font-Akira text-5xl px-5"><a href="index.php">SpyMovies</a></h1>
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

        </div>
    </div>
</section>