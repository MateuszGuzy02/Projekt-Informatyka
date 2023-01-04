<?php
    if(isset($_POST['login']) && isset($_POST['haslo'])) {
        $pol = mysqli_connect("localhost","mateusz","mateusz","text");

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

<form class="form" method="POST">
    <div class="formularz">
        <label>Login:</label>
        <input type="text" id="login" name="login"/>
    </div>

    <div class="formularz">
        <label>Hasło:</label>
        <input type="password" id="haslo" name="haslo" />
    </div>
    
    <div class="formularz">
        <input type="submit" class="wyslij" name="zaloguj" value="Zaloguj" />
        <button><a href="?opcja=rejestracja" class="rejestracja">Załóż konto</a></button>
    </div>
</form>