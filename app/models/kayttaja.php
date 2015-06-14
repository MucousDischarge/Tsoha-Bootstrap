<?php

class Kayttaja extends BaseModel {

    public $id, $kayttajanimi, $salasana;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($kayttajanimi, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE kayttajanimi = :kayttajanimi AND salasana = :salasana LIMIT 1', array('kayttajanimi' => $kayttajanimi, 'salasana' => $salasana));
        $query->execute(array('kayttajanimi' => $kayttajanimi, 'salasana' => $salasana));
        $row = $query->fetch();
        if ($row) {
            $kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'kayttajanimi' => $row['kayttajanimi'],
                'salasana' => $row['salasana']
            ));
            return $kayttaja;
        } else {
            return null;
        }
    }
    
    public static function find($kayttaja_id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $kayttaja_id));
        $row = $query->fetch();
        if ($row) {
            $kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'kayttajanimi' => $row['kayttajanimi'],
                'salasana' => $row['salasana']
            ));
            return $kayttaja;
        } else {
            return null;
        }
    }
}
