<?php

class Televizorius
{
    public $gamintojas;
    public $kanalas;
    public $garsas;

    public function __construct($gamintojas)
    {
        $this->gamintojas = $gamintojas;
        $this->kanalas = 1;
        $this->garsas = 50;
    }

    public function padidinti()
    {

        if ($this->garsas < 100) {
            $this->garsas++;
        }
    }
    public function sumazinti()
    {

        if ($this->garsas > 0) {
            $this->garsas--;
        }
    }
    public function informacija()
    {
        return "Televizorius $this->gamintojas, rodo $this->kanalas, garso lygis $this->garsas";
    }
}

$tv = new Televizorius("Sony");
// print_r("Televizorius: $tv->gamintojas <br> ");

print_r($tv->informacija());
echo $tv->padidinti();
echo $tv->padidinti();
echo $tv->padidinti();
echo $tv->sumazinti();
print_r($tv->informacija());

echo $tv->garsas;
// $padidintasGarsas = $tv->padidinti();
// echo ("Padidintas garsas: $padidintasGarsas <br>");

// $sumazintasGarsas = $tv->sumazinti($tv->garsas);
// echo ("Sumazintas garsas: $sumazintasGarsas <br>");
