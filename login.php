<?php
session_start();
require_once 'connection.php';


if(isset($_POST['send'])){
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $email = ($_POST['email']);
        $password = ($_POST['password']);

        $connection = new Connection();
        $result = $connection->take($email,$password);


        if (sizeof($result) > 0){
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $result['id'];
            $_SESSION['checkadmin'] = $result['checkadmin'];
            header('location:index.php');

        }
        else{
            echo "mot de passe ou email incorrect...";
        }
    }
    else{
        echo "mot de passe incorrect...";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="dist/style.css" rel="stylesheet">
    <title>Connect</title>
</head>
<?php include('header.php'); ?>
<body>
<section class="container">
    <div class="box_log">
    <form method="POST" class=" flex flex-col font-Bahn">
        <h2 class="font-Akira">Connectez vous</h2>
        <input type="text" name="email" id="log-email" placeholder="mail" class=" bg-transparent">
        <input type="text" name="password" id="log-pass" placeholder="password" class="bg-transparent">
        <input type="submit" value="register" name="send" class="">
    </form>
    </div>
</section>

</body>
</html>
