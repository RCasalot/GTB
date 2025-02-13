<?php
session_start();

//Détruire le cookie

if (isset($_COOKIE['connect'])) {
    setcookie('connect', '', time() - 3600, '/');
}

if (isset($_SESSION['id'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

?>