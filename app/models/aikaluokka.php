<?php

class Aika extends BaseModel {

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function kaikkikisat($id) {
        $query = DB::connection()->prepare('SELECT DISTINCT kisa_id FROM Aika WHERE kilpailija_id = :kilpailija_id');
        $query->execute(array('kilpailija_id' => $id));
        $rows = $query->fetch();
        return $rows;
    }

    public static function kilpailija_all($id, $kisa) {
        $query_string = 'SELECT valipiste_id, kisanumero, aika';
        $query_string .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id';
        $query_string .= ' AND aika = (SELECT max(aika) FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id)';
        $query = DB::connection()->prepare($query_string);
        $query->execute(array('kisa_id' => $kisa[0], 'kilpailija_id' => $id));
        $row = $query->fetch();
        return $row;
    }

    public static function kilpailija_latest_id($kilpailija) {
        $query_string = 'Select kisa_id FROM Aika';
        $query_string .= ' WHERE kilpailija_id = :kilpailija_id';
        $query_string .= ' AND aika = (select max(aika.aika)';
        $query_string .= ' FROM (select aika from Aika where kilpailija_id = :kilpailija_id and CURRENT_TIMESTAMP > aika) as aika)';
        $query = DB::connection()->prepare($query_string);
        $query->execute(array('kilpailija_id' => $kilpailija->id));
        $kisa = $query->fetch();

        return $kisa[0];
    }

    public static function kilpailija_latest_nimi($kisa_id) {
        $query2 = DB::connection()->prepare('SELECT nimi FROM Kisa WHERE id = :kisa_id');
        $query2->execute(array('kisa_id' => $kisa_id));
        $kisanimi = $query2->fetch();

        return $kisanimi[0];
    }
}
