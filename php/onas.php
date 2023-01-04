<?php
    $pol = mysqli_connect("localhost","mateusz","mateusz","text");
    if(!$pol) {
        echo "Brak połączenia z BD";
    } else {
        $zap = mysqli_query($pol,"SELECT * FROM onas");
        if(!mysqli_num_rows($zap)) {
            echo "Brak informacji";
        } else {
            while($dane=mysqli_fetch_array($zap)) {
                ?>
                <article>
                    <div class="tytula"><?php echo $dane["tytul"] ?></div>
                    <div class="tresca"><?php echo $dane["tresc"] ?></div>
                </article>
                <?php
            }
        }
    }
    mysqli_close($pol);
?>