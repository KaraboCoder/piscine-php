<?php
    function modify_account($username, $old_password, $new_password)
    {
        $data = "";
        $found = 0;
        if (trim($old_password) == "" || trim($new_password) == "")
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
            $old_password = hash("whirlpool", $old_password);
            $new_password = hash("whirlpool", $new_password);
            $unserialized_data = unserialize($data);
            if ($unserialized_data == false)
                $unserialized_data = array();
            for ($i = 0; $i < count($unserialized_data); $i++)
            {
                $person = $unserialized_data[$i];
                if ($person['login'] == $username)
                {
                    if($person['passwd'] != $old_password)
                        return "ERROR\n";
                    $person['passwd'] = $new_password;
                    $unserialized_data[$i] = $person;
                    $found = 1;
                    break;
                }
            }
            if ($found == 0)
                return "ERROR\n";
            file_put_contents("../private/password", serialize($unserialized_data), FILE_USE_INCLUDE_PATH);
            return "OK";
        }
    }
    if ($_POST['submit'] == "OK")
    {
        $username = $_POST['login'];
        $old_password = $_POST['oldpw'];
        $new_password = $_POST['newpw'];
        echo modify_account($username, $old_password, $new_password);
        header("Location: index.html");
    }
    else
        echo "ERROR\n";
?>