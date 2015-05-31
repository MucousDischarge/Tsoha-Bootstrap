<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        View::make('etusivu.html');
    }
    
    public static function hallinta() {
        View::make('hallintakirjautuminen.html');
    }
    
    public static function all() {
        
    }
    
    public static function find() {
    }
    
    public static function save() {
    }

}
