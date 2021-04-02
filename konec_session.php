<?php
    session_start();
    unset($_SESSION['user']);
    session_destroy();
    setcookie();
    
    header("Location: index.php");
?>