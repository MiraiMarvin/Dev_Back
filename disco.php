<?php
ini_set('display_errors', 'on');


session_start();
session_destroy();
header('location: index.php');
exit;
?>