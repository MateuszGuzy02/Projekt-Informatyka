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
                <img src="../img/blog.png" alt="Blog" />
            </header>
            <?php
                    if(isset($_SESSION['login'])) {
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
                        }
                    }
                ?>
            <nav>
                <ol>

                    <li><a href="?opcja=stronaglowna">Strona Główna</a>
                    <?php if($_SESSION['grupa']== "A") { ?>
                        <ol>
                            <li><a href="?opcja=dodajartykul">Dodaj artykuł</a></li>
                        </ol>
                    <?php } ?>
                    </li>

                    <li><a href="?opcja=onas">O nas</a>
                    <?php if($_SESSION['grupa']== "A") { ?>
                        <ol>
                            <li><a href="?opcja=modyfikujonas">Modyfikuj o nas</a></li>
                        </ol>
                    <?php } ?>
                    </li>

                    <?php
                        if($_SESSION['grupa']== "A") { ?>
                            <li><a href="?opcja=uzytkownik">Użytkownicy</a>
                            <ol>
                                <li><a href="?opcja=dodajuzytkownika">Dodaj użytkownika</a></li>
                            </ol>
                            </li>
                    <?php } else { ?>
                            <li><a href="?opcja=kontakt">Kontakt</a>
                    <?php   }
                    ?>      
                    </li>
                    
                    <li><a href="?opcja=wyloguj">Wyloguj</a></li>
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
                        if($_GET['opcja']=="modyfikujonas") {
                            include("php/modyfikujonas.php");
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
                        if($_GET['opcja']=="onas") {
                            include("../php/onas.php");
                        }
                        if($_GET['opcja']=="kontakt") {
                            include("../php/kontakt.php");
                        }

                    } //else {
                        //include("../php/stronaglowna.php");
                    //}
                ?>
            </main>
        </div>
        <footer>
            <?php
                    if(isset($_SESSION['login'])) {
                        echo "<div class = 'footer'>";
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
                            echo "Witaj ". "<b>".$dane['imie']." ". $dane['nazwisko']."</b>"." [";
                                if($dane['grupa']=="A")
                                    echo "Administrator";
                                else
                                    echo "Użytkownik";
                            echo "]";
                        }
                        echo "</div>";
                    }
                ?>
        </footer>
    </body>
</html>