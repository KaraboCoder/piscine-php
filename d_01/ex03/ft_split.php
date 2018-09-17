#!/usr/bin/php
<?php
    function ft_split($str)
    {
        $newArr = array();
        $arr = explode(" ", $str);
        foreach ($arr as $val)
        {
            if (strlen(trim($val)) !== 0)
                array_push($newArr,$val);
        }
        sort($newArr);
        return $newArr;
    }
?>