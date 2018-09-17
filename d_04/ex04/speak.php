<?php
    session_start();
    function add_chat($username, $message, $time)
    {
        $data = "";
            if (file_exists("../private") == false)
            {
                if(!mkdir("../private"))
                    return "ERROR\n";
            }
            $data = file_get_contents("../private/chat", FILE_USE_INCLUDE_PATH);
            if ($data == false)
            {
                file_put_contents("../private/chat","xxxx", FILE_USE_INCLUDE_PATH);
                if(($data = file_get_contents("../private/chat", FILE_USE_INCLUDE_PATH)) == false)
                    return "ERROR\n";
            }
            $chat = array("login" => $username, "time" => $time, "msg" => $message);
            $unserialized_data = unserialize($data);
            if ($unserialized_data == false)
                $unserialized_data = array();
            array_push($unserialized_data, $chat);
            file_put_contents("../private/chat", serialize($unserialized_data), FILE_USE_INCLUDE_PATH);
            return "OK";
    }
    if ($_POST['submit'] == "SEND")
    {
        $username = $_SESSION['logged_on_user'];
        $message = $_POST['message'];
        $time = time();
        add_chat($username, $message, $time);
    }
?>
<form action="speak.php" method="post">
    <input type="text" name="message" id="">
    <br/>
    <input type="submit" name="submit" value="SEND">
</form>