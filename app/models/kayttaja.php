<?php

class Kayttaja extends BaseModel {

    public $id, $kayttajanimi, $salasana;

    public static function authenticate() {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE kayttajanimi = :kayttajanimi AND salasana = :kayttajanimi LIMIT 1', array('kayttajanimi' => $kayttajanimi, 'salasana' => $salasana));
        $query->execute();
        $row = $query->fetch();
        if ($row) {
            // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
            return $row;
        } else {
            // Käyttäjää ei löytynyt, palautetaan null
            return null;
        }
    }

}
