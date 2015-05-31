<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('base.html');
    }
    
    public static function hallinta() {
        View::make('base.html');
    }
    
    public static function sandbox() {
        $eka = Malliluokka::find(1);
        $allu = Malliluokka::all();
        // Kint-luokan dump-metodi tulostaa muuttujan arvon
        Kint::dump($allu);
        Kint::dump($eka);
    }

}
