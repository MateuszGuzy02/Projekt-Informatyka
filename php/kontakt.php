<?php
    if(isset($_POST['wyslij'])) {
        $pol = mysqli_connect("localhost","root","","text");
        if(!$pol) {
            echo "Brak połączenia z BD";
        } else {
            $sql = "INSERT INTO `kontakt`(`imie`, `temat`, `wiadomosc`) VALUES ('$_POST[imie]','$_POST[temat]','$_POST[wiadomosc]')";
            $zap = mysqli_query($pol,$sql);
        }
    }
?>

<form method="POST">
    Imie:
    <br>
    <input type="text" id="imie" name="imie" /> <br>
    Temat:
    <br>
    <input type="text" id="temat" name="temat" /> <br>
    Wiadomość:
    <br>
    <textarea id="wiadomosc" name="wiadomosc"></textarea>
    <br>
    <input type="submit" value="Wyslij" id="wyslij" name="wyslij" />
</form>
