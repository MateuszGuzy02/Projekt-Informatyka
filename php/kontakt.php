<?php
    if(isset($_POST['wyslij'])) {
        $pol = mysqli_connect("localhost","root","","text");
        if(!$pol) {
            echo "Brak połączenia z BD";
        } else {
            $sql = "INSERT INTO `kontakt`(`imie`, `temat`, `wiadomosc`, `data_wyslania`) 
            VALUES ('$_POST[imie]','$_POST[temat]','$_POST[wiadomosc]', CURRENT_TIMESTAMP)";
            $zap = mysqli_query($pol,$sql);
        }
    }
?>

<form class="form" id="kontakt" method="POST">
    <div class="formularz">
        <label>Imię *</label>
        <input type="text" id="imie" name="imie" />
    </div>
    <div class="formularz">
        <label>Temat *</label>
        <input type="text" id="temat" name="temat" />
    </div>
    <div class="formularz">
        <label>Wiadomość *</label>
        <textarea id="wiadomosc" name="wiadomosc"></textarea>
    </div>
    <br>
    <div class="formularz">
        <input type="submit" class="wyslij" name="wyslij" value="Wyślij" />
    </div>
</form>
