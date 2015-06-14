<?php

class HelloWorldController extends BaseController {

    public static function index() {
        $kisat = Kisa::all();
        View::make('etusivu.html', array('kisat' => $kisat));
    }

    public static function hallinta() {
        View::make('/user/kirjautuminen.html');
    }

    public static function sandbox() {
        $doom = new Kisa(array(
            'nimi' => 'd',
            'ajankohta' => '1'
        ));
        $errors = $doom->errors();

        Kint::dump($errors);
    }

}
