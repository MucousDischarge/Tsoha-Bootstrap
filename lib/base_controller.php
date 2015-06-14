<?php

class BaseController {

    public static function get_user_logged_in() {
        if (isset($_SESSION['kayttajanimi'])) {
            $kayttaja_id = $_SESSION['kayttajanimi'];
            $kayttaja = Kayttaja::find($kayttaja_id);

            return $kayttaja;
        }

        return null;
    }

    public static function check_logged_in() {
        if(!(isset($_SESSION['kayttajanimi']))){
            Redirect::to('/login');
        }
    }

}
