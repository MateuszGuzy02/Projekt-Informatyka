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

<form action="?opcja=stronaglowna" method="post">
    Zmień tytuł artykuł: <br>
    <input type="text" name="tytul" size="80" value="<?php echo $dane['tytul']; ?>" />
    <br>Zmień treść artykułu: <br>
    <textarea name="tresc" cols="60" rows="10">
        <?php echo $dane['tresc']; ?>
    </textarea>
    <br>
    <input type="hidden" name="id" value="<?php echo $dane['id']; ?>" />
    <input type="submit" name="zmien_onas" value="Zmień" />
</form>
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/gcxz8z36t3el5zyzbqmofypbwvd0i85sorvbdpjcumsfy91y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
</body>
</html>