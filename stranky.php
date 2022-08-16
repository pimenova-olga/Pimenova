<?php
class Stranka
{
    public $id;
    public $titulek;
    public $menu;

    function __construct ($id, $titulek, $menu)
    {
        $this->id = $id;
        $this->titulek = $titulek;
        $this->menu = $menu;
    }

    function getObsah()
    {
        return file_get_contents("$this->id.html");
    }

    function setObsah($obsah)
    {
        file_put_contents("$this->id.html", $obsah);
    }
}


$seznamStranek = [
    "uvod" => new Stranka("uvod", "Uvod", "Domu"),
    "prihlaseni" => new Stranka("prihlaseni", "prihlaseni", "Prihlaseni"),
    "registrace" => new Stranka("registrace", "registrace", "Registrace"),
];

?>