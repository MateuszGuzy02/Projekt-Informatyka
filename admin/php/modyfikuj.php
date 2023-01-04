<?php
    $pol = mysqli_connect("localhost","mateusz","mateusz","text");
    if(!$pol) {
    echo "Brak połączenia z BD";
    exit();
    } else {
        $sql = "SELECT * 
        FROM artykuly
        WHERE id='$_GET[id]'";
        $zap = mysqli_query($pol,$sql);
        $dane = mysqli_fetch_array($zap);
    }
?>

<form class="form" action="?opcja=stronaglowna" method="post">
    Zmień tytuł artykuł: <br>
    <input type="text" name="tytul" size="80" value="<?php echo $dane['tytul']; ?>" />
    
    <br>Zmień treść artykułu: <br>
    <textarea name="tresc" cols="60" rows="10">
        <?php echo $dane['tresc']; ?>
    </textarea>
    <br>

    <input type="hidden" name="id" value="<?php echo $dane['id']; ?>" />

    <div class="formularz">
        <input type="submit" class="wyslij" name="zmien" value="Zmień" />
    </div>
</form>