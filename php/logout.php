<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        die();
    }
    session_unset();
    header("Location: ../index.php");
    die();
?>