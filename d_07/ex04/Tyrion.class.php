<?php
    class Tyrion{
        public function sleepWith($person){
            if ($person instanceof Jaime)
                echo "Not even if I'm drunk!\n";
            elseif ($person instanceof Lannister)
                echo "Not even if I'm drunk!\n";
            else
                echo "Let's do this.\n";            
        }
    }
?>