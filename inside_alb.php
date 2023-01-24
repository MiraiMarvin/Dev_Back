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
<body class="">
<?php include('header.php'); ?>
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
        </script>

    </div>
    <div>

    </div>
    <div id="main_contain">


    </div>
    <?php
    if (isset($_POST['myVar'])) {
        $myVar = $_POST['myVar'];
        $id_sup =$_GET['albid'];
        $connection = new Connection();
        $connection->deletefilm($myVar,$id_sup);

    }
    ?>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="PrintFilm.js" type="module"></script>
</body>
</html>