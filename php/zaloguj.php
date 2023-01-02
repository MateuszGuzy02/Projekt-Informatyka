<?php
    if(isset($_POST['login']) && isset($_POST['haslo'])) {
        $pol = mysqli_connect("localhost","root","","text");

        if(!$pol) {
            echo "Brak połączenia z BD";
            exit();
        } else {
            $szyfr = sha1($_POST['haslo']);
            $sql = "SELECT * 
            FROM logowanie
            WHERE login='$_POST[login]' AND haslo='$szyfr' ";
            $zap = mysqli_query($pol,$sql);
            
            if(!mysqli_num_rows($zap)) {
                echo "Nie poprawny login lub hasło";
            } else {
                $dane = mysqli_fetch_array($zap);
                //echo "Witaj ".$dane['login'];
                $_SESSION['login'] = $dane['login'];
                $_SESSION['id'] = $dane['id'];
                $_SESSION['grupa'] = $dane['grupa'];
                header("Location: admin/admin.php");
                exit();
            }
        }
    }
?>

<form method="POST" action="">
    Login:
    <br>
    <input type="text" id="login" name="login"/>
    <br>
    Hasło:
    <br>
    <input type="password" id="haslo" name="haslo" />
    <br><br>
    <input type="submit" value="Zaloguj" id="zaloguj" name="zaloguj" />
</form>
