<?php
    include("auth.php");
    session_start();
    $username = $_POST['login'];
    $password = $_POST['passwd'];
    if (auth($username, $password) == true)
    {
        $_SESSION['logged_on_user'] = $username;
        echo "OK<br/>";
        echo "<a href='logout.php'>Logout</a><br/>";
        echo "<iframe src='chat.php' style='height:550px'></iframe><br/>";
        echo "<iframe src='speak.php' style='height:50px'></iframe>";
    }
    else
    {
        $_SESSION['logged_on_user'] = "";
        echo "ERROR\n";
    }
?>