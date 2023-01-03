<?php
    if(isset($_GET['akt']) && $_GET['akt'] == 1) {
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "UPDATE `artykuly` SET `akt`='0'
        WHERE id='$_GET[id]'";
        $zap = mysqli_query($pol,$sql);
    }
    if(isset($_GET['akt']) && $_GET['akt'] == 0) {
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "UPDATE `artykuly` SET `akt`='1'
        WHERE id='$_GET[id]'";
        $zap = mysqli_query($pol,$sql);
    }
    if(isset($_POST['dodaj'])) {
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "INSERT INTO artykuly (`tytul`, `tresc`, `data_utworzenia`, `id_autora`)
        VALUES ('$_POST[tytul]', '$_POST[tresc]', CURRENT_TIMESTAMP, '$_SESSION[id]')";
        $zap = mysqli_query($pol,$sql);
    }

    if(isset($_GET['del'])) {
    $pol = mysqli_connect("localhost","root","","text");
    ?>
    <form method="POST" action="?opcja=stronaglowna&del=<?php echo $_GET['del']; ?>">
        Czy na pewno usunąć? 
        <input type="submit" value="TAK" name="tak" />
        <input type="submit" value="NIE" name="nie" />
    </form>
    <?php
    
    }
    
    if(isset($_POST['tak'])) {
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "DELETE FROM artykuly WHERE id='$_GET[del]'";
        $zap = mysqli_query($pol,$sql);
    }

    if(isset($_POST['zmien'])) {
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "UPDATE artykuly SET tytul = '$_POST[tytul]', tresc = '$_POST[tresc]', data_zmiany = CURRENT_TIMESTAMP
        WHERE id = '$_POST[id]'";
        $zap = mysqli_query($pol,$sql);
    }

    if(isset($_POST['zmien_onas'])) {
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "UPDATE onas SET id = '1' ,tytul = '$_POST[tytul]', tresc = '$_POST[tresc]'
        WHERE 1";
        $zap = mysqli_query($pol,$sql);
        
    }

    if(isset($_POST['zaloz'])) {
        $szyfr = sha1($_POST['haslo']);
        $pol = mysqli_connect("localhost","root","","text");
        $sql = "INSERT INTO logowanie (`imie`, `nazwisko`, `login`, `haslo`)
        VALUES ('$_POST[imie]', '$_POST[nazwisko]', '$_POST[login]', '$szyfr')";
        $zap = mysqli_query($pol,$sql);
    }
?>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Tytuł</th>
        <th>AKT</th>
        <th>Opcje</th>
    </thead>

<?php
    $pol = mysqli_connect("localhost","root","","text");
    if(!$pol) {
        echo "Brak połączenia z BD";
        exit();
    } else {
        $sql = "SELECT * FROM artykuly";
        $zap = mysqli_query($pol,$sql);
        while($dane = mysqli_fetch_array($zap)) {
?>
        <tr>
            <td><?php echo $dane['id']; ?></td>
            <td><?php echo $dane['tytul']; ?></td>
            <td><?php if($dane['akt']==0) { ?>
                   <a href="?opcja=<?php echo $_GET['opcja']; ?>&akt=<?php echo $dane['akt']; ?>&id=<?php echo $dane['id']; ?>"> 
                   <img src="img/x.png" alt="X"> </a>
<?php 
            } else {
?>
                    <a href="?opcja=<?php echo $_GET['opcja']; ?>&akt=<?php echo $dane['akt']; ?>&id=<?php echo $dane['id']; ?>"> 
                    <img src="img/ok.png"> </a>
<?php
            } 
?>
            </td>
            <td> 
                <a href="?opcja=modyfikuj&id=<?php echo $dane['id']; ?>"> 
                    <img src="img/edytuj.png" alt="edytuj" /> 
                </a>/ 
                <a href="?opcja=<?php echo $_GET['opcja'];?>&del=<?php echo $dane['id']; ?>">
                <img src="img/kosz.png" width="30px" alt="usuń" onclick="potwierdzenie()"/>   </a>
            </td>
        </tr>

<?php
        }
    }
    mysqli_close($pol);
?>
</table>
