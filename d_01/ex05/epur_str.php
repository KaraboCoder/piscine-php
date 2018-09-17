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
        return $newArr;
    }
    print implode(" ", ft_split( $argv[1]))."\n";
?>