<?php

class Televizorius
{
    public $gamintojas;
    public $kanalas;
    public $page;
    public $totalVideos;

    public function __construct($gamintojas)
    {
        $this->gamintojas = $gamintojas;
        $this->kanalas = 1;
        $this->page = 50;
        
        $this->totalVideos = count($videos);
    }

    public function padidinti()
    {

        if ($this->page < 100) {
            $this->page++;
        }
    }
    // public function sumazinti()
    // {

    //     if ($this->page > 0) {
    //         $this->page--;
    //     }
    }
    public function informacija()
    {
        return "Televizorius $this->gamintojas, rodo $this->kanalas, garso lygis $this->page";
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

echo $tv->page;
// $padidintaspage = $tv->padidinti();
// echo ("Padidintas page: $padidintaspage <br>");

// $sumazintaspage = $tv->sumazinti($tv->page);
// echo ("Sumazintas page: $sumazintaspage <br>");
