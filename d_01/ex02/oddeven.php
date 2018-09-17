#!/usr/bin/php
<?php
    $handle = fopen("php://stdin", "r");
    echo "Enter a number: ";
    while (($line = fgets($handle)) !== false)
    {
        $line = trim($line);
        if (is_numeric($line))
        {
            $val = intval($line);
            if ($val % 2 == 0)
                echo "The number ".$line." is even\n";
            else
                echo "The number ".$line." is odd\n";                
        }
        else
        {
            echo "'".$line."' is not a number\n";
        }
        echo "Enter a number: ";
    }
    fclose($handle);
?>