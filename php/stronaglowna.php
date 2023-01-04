<?php
    if(isset($_POST['dodaj'])) {
        $pol = mysqli_connect("localhost","mateusz","mateusz","text");
        $sql = "INSERT INTO artykuly (`tytul`, `tresc`, `data_utworzenia`, `id_autora`)
        VALUES ('$_POST[tytul]', '$_POST[tresc]', 'CURRENT_TIMESTAMP', '$_SESSION[id]')";
        $zap = mysqli_query($pol,$sql);
    }

    if(isset($_POST['zaloz'])) {
        $szyfr = sha1($_POST['haslo']);
        $pol = mysqli_connect("localhost","mateusz","mateusz","text");
        $sql = "INSERT INTO logowanie (`imie`, `nazwisko`, `login`, `haslo`, `grupa`)
        VALUES ('$_POST[imie]', '$_POST[nazwisko]', '$_POST[login]', '$szyfr', 'U')";
        $zap = mysqli_query($pol,$sql);
    }

    $pol = mysqli_connect("localhost","mateusz","mateusz","text");
    if(!$pol) {
        echo "Brak połączenia z bazą danych";
    } else {
        $zap = mysqli_query($pol,"SELECT * FROM artykuly WHERE akt=1");
        if(!mysqli_num_rows($zap)) {
            echo "Brak artykułów na stronie";
        } else {
            while($dane=mysqli_fetch_array($zap)) {
                ?>
                <article>
                    <div class="tytula"><?php echo $dane["tytul"]; ?></div>
                    <div class="tresca"><?php echo $dane["tresc"]; ?></div>
                    <div class="data"><?php echo $dane["data_utworzenia"]; ?></div>
                </article>
                <?php
            }
        }
    }
    mysqli_close($pol);
?>