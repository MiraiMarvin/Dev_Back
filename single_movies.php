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
    <title>Single_page_movies</title>
</head>
<body class="bg-black">
<?php include('header.php'); ?>
<section class="single_page_main">
    <div id="single_pic"> </div>
    <div id="single_desc">
        <?php
        $allalb = $_SESSION['id'];
        $connection = new Connection();
        $result = $connection->getAllAlbum($allalb);
        ?>
        <p class="text-white font-Bahn">ajoutez ce film à un album</p>
        <form method="POST">
            <select name="mon_select"  class="border-2 border-white bg-transparent text-white">
                <?php
                foreach ($result as $element) {
                    echo '<option name="choose" value="' . $element['id'] . '">' . $element['title'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" value="register" class="btn btn-primary">
        </form>
        <?php
        require_once 'film.php';
        require_once 'connection.php';




        if ($_POST) {
            $film = new film(
                $_GET['id'],
                $_POST['mon_select'],

            );
                $connection = new Connection();
                $result = $connection->insertFilm($film);

                if ($result) {
                    echo 'Registered with success!';
                } else {
                    echo ' error ';
                }
            } else {
                echo 'Form has an error';
            }




        ?>


    </div>
    <div id="single_genre"></div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Axios-search.js" type="module"></script>
<script src=single_search.js type="module"></script>
</body>
</html>