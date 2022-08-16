<?php
    require "stranky.php";

    session_start();

    $chyba = "";

    if (array_key_exists("prihlasit", $_POST))
    {
        $jmeno = $_POST["jmeno"];
        $heslo = $_POST["heslo"];

        if ($jmeno == "admin" && $heslo == "heslo123")
        {
            $_SESSION["prihlasenyUzivatel"] = $jmeno;
        }
        else
        {
            $chyba = "Nespravne prihlasovaci udaje";
        }
    }

    if (array_key_exists("odhlasit", $_POST))
    {
        unset($_SESSION["prihlasenyUzivatel"]);
        header("Location: ?");
    }

    if (array_key_exists("prihlasenyUzivatel", $_SESSION))
    {
        $instanceAktualniStranky = null;

        if (array_key_exists("stranka", $_GET))
        {
            $idStranky = $_GET["stranka"];
            $instanceAktualniStranky = $seznamStranek[$idStranky];
        }

        if (array_key_exists("ulozit", $_POST))
        {
            $obsah = $_POST["obsah"];
            $instanceAktualniStranky->setObsah($obsah);

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrace</title>
</head>
<body>
    <?php
        if (array_key_exists("prihlasenyUzivatel", $_SESSION) == false)
        {
        ?>
        <form method="post">
            <label for="jmeno">Prih.jmeno</label>
            <input type="text" name="jmeno" id="jmeno">
            <br>
            <label for="heslo">Heslo</label>
            <input type="password" name="heslo" id="heslo">
            <br>

            <button name="prihlasit">Prihlasit</button>
        </form>
        
        <?php
            echo $chyba;
        }    
        else
        
        {
            echo "Prihlasen uzivatel: {$_SESSION["prihlasenyUzivatel"]}";

            echo "<form method='post'>
            <button name='odhlasit'>Odhlasit</button>
            </form>";

            echo "<ul>";
            {
                echo "<li><a href='?stranka=uvod'>Domu</a></li>";
            }
            echo "</ul>";

            if ($instanceAktualniStranky != null)
            {
                echo "<h1>Editace stranky: $instanceAktualniStranky->id</h1>";

                ?>
                <form method="post">
                    <textarea id="obsah" name="obsah" cols="80" rows="15"><?php
                    echo $instanceAktualniStranky->getObsah();
                    ?></textarea>
                    <br>
                    <button name="ulozit">Ulozit</button>
                </form>
                <script src="vendor\tinymce\tinymce\tinymce.min.js"></script>
                <script type="text/javascript">
                    tinymce.init({
                        selector: '#obsah'
                        });
                </script>

                <?php
            }
        }
        
        ?>

    
</body>
</html>