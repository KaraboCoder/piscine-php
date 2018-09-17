<?php
    include("auth.php");
    session_start();
    $username = $_GET['login'];
    $password = $_GET['passwd'];
    if (auth($username, $password) == true)
    {
        $_SESSION['logged_on_user'] = $username;
        echo "OK\n";
    }
    else
    {
        $_SESSION['logged_on_user'] = "";
        echo "ERROR\n";
    }
?>