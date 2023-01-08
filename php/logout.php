<?php 
    session_start();
    session_unset();
    $_SESSION['zalogowany'] = false;
    session_destroy();
    header("Location: ../index.php");
?>