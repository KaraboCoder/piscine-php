<?php
    if ($_SERVER["PHP_AUTH_USER"] != "zaz" || $_SERVER["PHP_AUTH_PW"] != "Ilovemylittleponey")
    {
        header("WWW-Authenticate: Basic realm='Restricted Area'");
        header("HTTP/1.0 401 Unauthorized");
        echo "<html><body>That area is accessible for members only</body></html>";
         
    }
    else
    {
        $image = "../img/42.png";
        $imageData = base64_encode(file_get_contents($image));
        $src = "data:image/png;base64,".$imageData;
        echo "<html><body>\nHello Zaz<br/>";
        echo "<img src=$src>\n";
        echo "</body></html>";
    }
?>