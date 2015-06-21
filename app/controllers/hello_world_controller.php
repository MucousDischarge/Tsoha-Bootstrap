<?php

class HelloWorldController extends BaseController {

    public static function index($page) {
        $options = array();
        $kisat = Kisa::all($options, $page);
        $kisat_count = Kisa::count();
        $page_size = 10;
        $pages = ceil($kisat_count / $page_size);
        View::make('etusivu.html', array('kisat' => $kisat, 'pages' => $pages));
    }

    public static function kirjautuminen() {
        View::make('/user/kirjautuminen.html');
    }

}
