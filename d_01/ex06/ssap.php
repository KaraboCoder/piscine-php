#!/usr/bin/php
<?php
    $all_args = array();
    array_splice($argv, 0, 1);
    function ft_split_and_sort($arg)
    {
        $newArr = array();
        $arr = explode(" ", $arg);
        foreach ($arr as $val)
        {
            if (strlen(trim($val)) !== 0)
                array_push($newArr,$val);
        }
        return $newArr;
    }
    foreach ($argv as $arg)
        foreach(ft_split_and_sort($arg) as $val)
            array_push($all_args, $val);
    sort($all_args);
    foreach($all_args as $val)
        print "$val\n";
?>