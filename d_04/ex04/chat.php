<?php
    echo "<p><a href='chat.php'>Refresh</a></p>";
    function get_chats()
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
            $unserialized_data = unserialize($data);
            if ($unserialized_data == false)
                $unserialized_data = array();
            for ($i = 0; $i < count($unserialized_data); $i++)
            {
                $chat = $unserialized_data[$i];
                echo "<div style='border:1px solid #000;'>";
                echo "<p>Sent By: ", $chat['login'],"</p>";
                echo "<p>Chat: ", $chat['msg'],"</p>";
                echo "<p>Posted: ", date("Y-m-d h:i:sa", $chat['time']),"</p>";
                echo "</div>";
            }
    }
    get_chats();
?>