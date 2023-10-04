<?php



class Televizorius
{
    public $gamintojas;
    public $kanalas = 1;
    public $garsas = 50;

    public function __construct($gamintojas)
    {
        echo ("Kanalas yra: $this->kanalas <br>");
        echo ("Garsas yra: $this->garsas <br>");
    }

    public function didinti($garsas)
    {
        if ($this->garsas <= 100) {
            return $garsas + 1;
        }
    }
}
//paleidziamos defaultines reiksmes
$a = new Televizorius('Sony');

$didelis = $a->garsas;

$padidinimas = $a->didinti($a->garsas);
echo $padidinimas;
