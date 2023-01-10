<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="icon" href="img/icon.png" type="image/png" alt="https://www.flaticon.com/free-icons/blog">
        <title>Blog</title>
    </head>
    <body>
        <div class="content">
            <header>
            <a href="?opcja=stronaglowna">
                <img src="img/blog.png" alt="Blog" /> 
            </a>
            </header>
            <nav>
                <ol>
                    <li><a href="?opcja=stronaglowna">Strona Główna</a></li>
                    <li><a href="?opcja=onas">O nas</a></li>
                    <li><a href="?opcja=kontakt">Kontakt</a>
                    <li><a href="?opcja=zaloguj">Zaloguj</a>
                </ol>
            </nav>
            <main>
                <?php
                    if(isset($_GET['opcja'])) {
                        if($_GET['opcja']=="stronaglowna") {
                            include("php/stronaglowna.php");
                        }
                        if($_GET['opcja']=="onas") {
                            include("php/onas.php");
                        }
                        if($_GET['opcja']=="kontakt") {
                            include("php/kontakt.php");
                        }
                        if($_GET['opcja']=="zaloguj") {
                            include("php/zaloguj.php");
                        }
                        if($_GET['opcja']=="rejestracja") {
                            include("php/rejestracja.php");
                        }
                    } else {
                        include("php/stronaglowna.php");
                    }
                ?>
            </main>
        </div>
    </body>
</html>