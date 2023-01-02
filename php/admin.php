<?php
    if(isset($_POST['zaloguj'])) {
        $pol = mysqli_connect("localhost","root","","text");
        if(!$pol) {
            echo "Brak połączenia z BD";
        } else {
            $szyfr = sha1($_POST['haslo']);
            $sql = "SELECT *
            FROM logowanie
            WHERE login='$_POST[login]' AND haslo='$szyfr'";
            $zap = mysqli_query($pol,$sql);
            if(!mysqli_num_rows($zap)) {
                echo "Nie poprawny login lub hasło";
            } else {
                $dane = mysqli_fetch_array($zap);
                echo "Witaj ".$dane['login'];
            }
        }
    }
    mysqli_close($pol);
?>