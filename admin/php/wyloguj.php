<html>
    <head>
    <title>Wyloguj</title>
    </head>
    <body>
        <div class="wyloguj">
        <?php
            $pol = mysqli_connect("localhost","mateusz","mateusz","text");
            if(!$pol) {
                echo "Brak połączenia z BD";
                exit();
            } else {
               $sql = "SELECT * FROM logowanie WHERE login='$_SESSION[login]'";
               $zap = mysqli_query($pol,$sql);
               $dane = mysqli_fetch_array($zap);
               echo "Użytkownik "."<b>" .$dane['login']."</b>" ." został wylogowany!";
               echo "<br>";
               echo "Przejdź do strony głównej:<br>";
               echo "<a href=\"../index.php\">Strona Główna</a>";
               session_destroy();
            }
        ?>
        </div>
    </body>
</html>