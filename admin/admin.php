<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style.css" type="text/css">
        <title>Blog</title>
    </head>
    <body>
        <div class="content">
            <header>

            </header>
            <?php
                if(isset($_SESSION['login'])) {
                    echo "<nav>";
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
                            echo "Witaj ". $dane['imie']." ". $dane['nazwisko']." [";
                                if($dane['grupa']=="A")
                                    echo "Administrator";
                                else
                                    echo "użytkownik";
                            echo "]";
                        }

                    echo "</nav>";
                }
            ?>
            <nav>
                <ol>
                    <li><a href="?opcja=stronaglowna">Strona Głowna</a>
                    <?php if($_SESSION['grupa']== "A") { ?>
                        <ol>
                            <li><a href="?opcja=dodajartykul">Dodaj artykuł</a></li>
                        </ol>
                    <?php } ?>
                    </li>
                    <li><a href="?opcja=onas">O nas</a>
                    <li><a href="?opcja=uzytkownik">Użytkownicy</a>
                    <?php if($_SESSION['grupa']== "A") { ?>
                        <ol>
                            <li><a href="?opcja=dodajuzytkownika">Dodaj użytkownika</a></li>
                        </ol>
                    <?php } ?>
                    </li>
                    <li><a href="?opcja=wyloguj">Wyloguj</a>
                </ol>
            </nav>
            <main>
                <?php
                    if(isset($_GET['opcja'])) {
                        if($_GET['opcja']=="stronaglowna") {
                            if($dane['grupa']=="A") {
                                include("php/stronaglowna.php");
                            }
                            else {
                                include("../php/stronaglowna.php");
                            }  
                        }
                        if($_GET['opcja']=="onas") {
                            include("php/onas.php");
                        }
                        if($_GET['opcja']=="modyfikuj") {
                            include("php/modyfikuj.php");
                        }
                        if($_GET['opcja']=="uzytkownik") {
                            include("php/uzytkownicy.php");
                        }
                        if($_GET['opcja']=="wyloguj") {
                            include("php/wyloguj.php");
                        }
                        if($_GET['opcja']=="dodajartykul") {
                            include("php/dodajartykul.php");
                        }
                        if($_GET['opcja']=="dodajuzytkownika") {
                            include("php/dodajuzytkownika.php");
                        }

                    } //else {
                        //include("../php/stronaglowna.php");
                    //}
                ?>
            </main>
        </div>
        <footer>
            
        </footer>
    </body>
</html>