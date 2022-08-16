<?php
require "stranky.php";

if (array_key_exists("stranka", $_GET))
{
  $stranka = $_GET["stranka"];
}
else
{
  $stranka = "uvod";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test PHP</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/section.css" />
  </head>
  <body>
    <header>
      <menu>
        <div class="container">
          <nav>
            <ul>
              <li><a href="?stranka=uvod">Domu</a></li>
              <li><a href="?stranka=prihlaseni">Prihlaseni</a></li>
              <li><a href="?stranka=registrace">Registrace</a></li>
            </ul>
          </nav>
        </div>
      </menu>

    </div>
    </header>

    <section>
      <?php
        echo $seznamStranek[$stranka]->getObsah();
      ?>
    </section>

  </body>
</html>
