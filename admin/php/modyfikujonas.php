<?php
    $pol = mysqli_connect("localhost","root","","text");
    if(!$pol) {
    echo "Brak połączenia z BD";
    exit();
    } else {
        $sql = "SELECT * 
        FROM onas
        WHERE id=1";
        $zap = mysqli_query($pol,$sql);
        $dane = mysqli_fetch_array($zap);
    }
?>

<form class="form" action="?opcja=stronaglowna" method="post">
    <div class="formularz">
      <label>Zmień tytuł artykuł:</label>
      <input type="text" name="tytul" size="80" value="<?php echo $dane['tytul']; ?>" />
    </div>
    
    <div class="formularz">
      <label>Zmień treść artykułu:</label>
      <textarea name="tresc" cols="60" rows="10">
        <?php echo $dane['tresc']; ?>
      </textarea>
    </div>

    <div class="formularz">
      <input type="submit" class="wyslij" name="zmien_onas" value="Zmień" />
    </div> 
</form>
