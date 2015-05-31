<?php

require 'app/models/malliluokka.php';

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu!';
    }
    
    public static function hallinta() {
        View::make('hallintakirjautuminen.html');
    }
    
    public static function sandbox() {
        $eka = Malliluokka::find(1);
        $allu = Malliluokka::all();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($allu);
        Kint::dump($eka);
    }

}
