<?php
    function create_account($username, $password)
    {
        $data = "";
        if (trim($password) == "")
            return "ERROR\n";
        else
        {
            if (file_exists("../private") == false)
            {
                if(!mkdir("../private"))
                    return "ERROR\n";
            }
            $data = file_get_contents("../private/password", FILE_USE_INCLUDE_PATH);
            if ($data == false)
            {
                file_put_contents("../private/password","xxxx", FILE_USE_INCLUDE_PATH);
                if(($data = file_get_contents("../private/password", FILE_USE_INCLUDE_PATH)) == false)
                    return "ERROR\n";
            }
            $password = hash("whirlpool", $password);
            $user = array("login" => $username, "passwd" => $password);
            $unserialized_data = unserialize($data);
            if ($unserialized_data == false)
                $unserialized_data = array();
            for ($i = 0; $i < count($unserialized_data); $i++)
            {
                $person = $unserialized_data[$i];
                if ($person['login'] == $username)
                    return "ERROR\n";
            }
            array_push($unserialized_data, $user);
            file_put_contents("../private/password", serialize($unserialized_data), FILE_USE_INCLUDE_PATH);
            return "OK";
        }
    }
    if ($_POST['submit'] == "OK")
    {
        $username = $_POST['login'];
        $password = $_POST['passwd'];
        echo create_account($username, $password);
    }
    else
        echo "ERROR\n";
?>