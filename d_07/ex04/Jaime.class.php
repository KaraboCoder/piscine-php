<?php
    class Jaime{
        public function sleepWith($person){
            if ($person instanceof Tyrion)
                echo "Not even if I'm drunk!\n";
            elseif ($person instanceof Lannister)
                echo "With pleasure, but only in a tower in Winterfell, then.\n";
            else
                echo "Let's do this.\n";
        }
    }
?>