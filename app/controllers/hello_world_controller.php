<?php

class HelloWorldController extends BaseController {

    public static function index() {
        $options = array();
        $kisat = Kisa::all($options);
        $kisat_count = Kisa::count();
        $page_size = 10;
        $pages = ceil($kisat_count / $page_size);
        View::make('etusivu.html', array('kisat' => $kisat, 'pages' => $pages));
    }

    public static function kirjautuminen() {
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
