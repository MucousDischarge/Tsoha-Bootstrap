<?php

class Kayttaja extends BaseModel {

    public $kayttajanimi, $salasana;

    public static function blah() {
        $query = DB::connection()->prepare('SELECT * FROM Player WHERE name = :name AND password = :password LIMIT 1', array('name' => $kayttajanimi, 'password' => $salasana));
        $query->execute();
        $row = $query->fetch();
        if ($row) {
            // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
            return;
        } else {
            // Käyttäjää ei löytynyt, palautetaan null
            return null;
        }
    }

}
