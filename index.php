<?php

// Autoloader
function nactiTridu($trida) {
    require("tridy/$trida.php");
}

spl_autoload_register("nactiTridu");

Databaze::pripoj('localhost', 'root', '', 'diskuze_db');

$diskuze = new Diskuze();

// Zpracování odeslaného formuláře
if ($_POST) {
    $diskuze->pridejZpravu($_POST['prezdivka'], $_POST['zprava']);
    header('Location: index.php'); // Přesměrování
}
?>

<!DOCTYPE html>

<html lang="cs-cz">
    <head>
        <meta charset="utf-8" />
        <title>Diskuze</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Vzkazník</h1>
        <div style="width: 640px; margin: 0 auto;">

            <?php
            $diskuze->vypis();
            ?>

            <form method="post">
                Přezdívka<br />
                <input name="prezdivka" type="text" /><br />
                Zpráva<br />
                <textarea name="zprava" style="width: 100%"></textarea><br />
                <div style="text-align: center">
                    <input type="submit" value="Odeslat" />
                </div>
            </form>

        </div>
    </body>
</html>
