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
    $ret = ft_split( $argv[1]);
    $first_word = $ret[0];
    array_splice($ret, 0, 1);
    foreach($ret as $word)
        print "$word ";
    print "$first_word\n";
?>