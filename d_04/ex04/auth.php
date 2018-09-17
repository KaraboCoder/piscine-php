<?php
    function auth($username, $password)
    {
        $data = "";
        if (trim($password) == "" || trim($username) == "")
            return false;
        else
        {
            if (file_exists("../private") == false)
            {
                if(!mkdir("../private"))
                    return false;
            }
            $data = file_get_contents("../private/password", FILE_USE_INCLUDE_PATH);
            if ($data == false)
            {
                file_put_contents("../private/password","xxxx", FILE_USE_INCLUDE_PATH);
                if(($data = file_get_contents("../private/password", FILE_USE_INCLUDE_PATH)) == false)
                    return false;
            }
            $password = hash("whirlpool", $password);
            $unserialized_data = unserialize($data);
            if ($unserialized_data == false)
                $unserialized_data = array();
            for ($i = 0; $i < count($unserialized_data); $i++)
            {
                $person = $unserialized_data[$i];
                if ($person['passwd'] == $password && $person['login'] == $username)
                    return true;
            }
            return false;
        }
    }
?>