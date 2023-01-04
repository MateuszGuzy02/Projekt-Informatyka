<script>
    function pokaz(a) {
        if(document.getElementById(a).style.visibility=="hidden") {
            document.getElementById(a).style.visibility="visible";
        } else {
            document.getElementById(a).style.visibility="hidden";
        }    
    }
</script>

<?php
    if(isset($_POST['zmien'])) {
        $pol = mysqli_connect("localhost","mateusz","mateusz","text");
        if(!$pol) {
            echo "Brak połączenia z BD";
            exit();
        } else {
            if($_GET['grupa']=="A") {
                $zap = mysqli_query($pol,"UPDATE logowanie SET grupa=\"U\" WHERE id='$_GET[idu]'");
            }
            else {
                $zap = mysqli_query($pol,"UPDATE logowanie SET grupa=\"A\" WHERE id='$_GET[idu]'");
            }
        }
    }
?>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Login</th>
        <th>Grupa</th>
    </thead>

<?php
    $pol = mysqli_connect("localhost","mateusz","mateusz","text");
    if(!$pol) {
        echo "Brak połączenia z BD";
        exit();
    } else {
        $sql = "SELECT * FROM logowanie";
        $zap = mysqli_query($pol,$sql);
        while($dane = mysqli_fetch_array($zap)) {
            ?>
            <tr>
                <td>
                    <?php echo $dane['id']; ?>
                </td>
                <td>
                    <?php echo $dane['login']; ?>
                    <br>
                    <div style="font-size: 12px;">Imie i nazwisko:
                        <?php echo $dane['imie']." ". $dane['nazwisko']; ?>
                    </div>
                </td>
                <td>
                    <?php 
                        if($dane['grupa']== "A")
                            echo "Administrator";
                        else
                            echo "Użytkownik";
                    ?>
                    <?php
                    if($_SESSION['grupa']== "A") {
                    ?>

                        <div onMouseOver="this.style.background='#009879'" onMouseOut="this.style.background='#FFFFFF'" onclick="pokaz('ukryte<?php echo $dane['id']; ?>')">
                        Zmień grupę
                        </div>

                        <div id="ukryte<?php echo $dane['id']; ?>" style="visibility:hidden">
                            <form class="grupa" action="?opcja=<?php echo $_GET['opcja'];?>&idu=<?php echo $dane['id'];?>&grupa=<?php echo $dane['grupa'] ?>" method="POST">
                                <input type="submit" name="zmien" 
                                <?php
                                    if($dane['grupa']=="A") {
                                      echo "value='Zmień na uzytkownika'";
                                    } else {
                                        echo "value='Zmień na administratora'";
                                    }
                                ?>
                             />
                            </form>
                        </div>
            <?php   } ?>
                </td>
            </tr>
            <?php
        }
    }
?>
</table>