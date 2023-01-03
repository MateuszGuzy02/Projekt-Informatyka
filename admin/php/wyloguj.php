<html>
    <head>
    <title>wyloguj</title>
    </head>
    <body>
        <?php
            $pol = mysqli_connect("localhost","root","","text");
            if(!$pol) {
                echo "Brak połączenia z BD";
                exit();
            } else {
               $sql = "SELECT * 
               FROM logowanie
               WHERE login='$_SESSION[login]'";
               $zap = mysqli_query($pol,$sql);
               $dane = mysqli_fetch_array($zap);
               echo "Użytkownik "."<b>" .$dane['login']."</b>" ." został wylogowany";
               echo "<br>";
               echo "Przejdź do strony głównej<br>";
               echo "<a href=\"../index.php\">Strona Główna</a>";
               session_destroy();
            }
        ?>
    </body>
</html>
﻿
