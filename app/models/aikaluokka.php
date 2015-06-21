<?php

class Aika extends BaseModel {

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validoi_kisa_id', 'validoi_kilpailija_id', 'validoi_kisanumero');
    }

    public function save($attributes) {
        $query = DB::connection()->prepare('INSERT INTO Aika (kisa_id, valipiste_id, kilpailija_id, kisanumero) VALUES (:kisa_id, 1, :kilpailija_id, :kisanumero)');
        $query->execute(array('nimi' => $params['kisa_id'], 'ajankohta' => $params['kilpailija_id'], 'kisanumero' => $params['kisanumero']));
        $row = $query->fetch();
    }

    public static function kaikkikisat($id, $page) {
        $query_string = 'SELECT DISTINCT kisa_id FROM Aika';

        $page_size = 10;

        $offset = $page_size * ($page - 1);

        $query_string .= ' WHERE kilpailija_id = :kilpailija_id';

        $query_string .= ' LIMIT :limit OFFSET :offset';

        $query = DB::connection()->prepare($query_string);
        $query->execute(array('kilpailija_id' => $id, 'limit' => $page_size, 'offset' => $offset));
        $rows = $query->fetchAll();
        return $rows;
    }

    public static function kilpailija_all($id, $kisa) {
        $query_stringtest = 'SELECT kisanumero, aika';
        $query_stringtest .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id';
        $query_stringtest .= ' AND valipiste_id = (SELECT max(valipiste_id) FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id)';
        $querytest = DB::connection()->prepare($query_stringtest);
        $querytest->execute(array('kisa_id' => $kisa[0], 'kilpailija_id' => $id));
        $testrow = $querytest->fetch();
        if (isset($testrow[1])) {
            $query_string = 'SELECT valipiste_id, kisanumero, aika';
            $query_string .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id AND valipiste_id != 1';
            $query_string .= ' AND aika = (SELECT max(aika) FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id)';
            $query = DB::connection()->prepare($query_string);
            $query->execute(array('kisa_id' => $kisa[0], 'kilpailija_id' => $id));
            $row = $query->fetch();
            return $row;
        }
        return $testrow;
    }
    
    public static function kaikkikilpailijat($id, $page) {
        $query_string = 'SELECT DISTINCT kilpailija_id FROM Aika';

        $page_size = 10;

        $offset = $page_size * ($page - 1);

        $query_string .= ' WHERE kisa_id = :kisa_id';

        $query_string .= ' LIMIT :limit OFFSET :offset';

        $query = DB::connection()->prepare($query_string);
        $query->execute(array('kisa_id' => $id, 'limit' => $page_size, 'offset' => $offset));
        $rows = $query->fetchAll();
        return $rows;
    }

    public static function kisa_all($id, $kilpailija) {
        $query_stringtest = 'SELECT kisanumero, aika';
        $query_stringtest .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id';
        $query_stringtest .= ' AND valipiste_id = (SELECT max(valipiste_id) FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id)';
        $querytest = DB::connection()->prepare($query_stringtest);
        $querytest->execute(array('kisa_id' => $id, 'kilpailija_id' => $kilpailija[0]));
        $testrow = $querytest->fetch();
        if (isset($testrow[1])) {
            $query_string = 'SELECT valipiste_id, kisanumero, aika';
            $query_string .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id AND valipiste_id != 1';
            $query_string .= ' AND aika = (SELECT max(aika) FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id)';
            $query = DB::connection()->prepare($query_string);
            $query->execute(array('kisa_id' => $id, 'kilpailija_id' => $kilpailija[0]));
            $row = $query->fetch();
            return $row;
        }
        return $testrow;
    }
    
    public static function kisa_all_haku($id, $kilpailija, $valipiste_id) {
        $query_stringtest = 'SELECT kisanumero, aika';
        $query_stringtest .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id';
        $query_stringtest .= ' AND valipiste_id = (SELECT max(valipiste_id) FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id)';
        $querytest = DB::connection()->prepare($query_stringtest);
        $querytest->execute(array('kisa_id' => $id, 'kilpailija_id' => $kilpailija[0]));
        $testrow = $querytest->fetch();
        if (isset($testrow[1])) {
            $query_string = 'SELECT valipiste_id, kisanumero, aika';
            $query_string .= ' FROM Aika WHERE kilpailija_id = :kilpailija_id AND kisa_id = :kisa_id AND valipiste_id = :valipiste_id';
            $query = DB::connection()->prepare($query_string);
            $query->execute(array('kisa_id' => $id, 'kilpailija_id' => $kilpailija[0], 'valipiste_id' => $valipiste_id));
            $row = $query->fetch();
            return $row;
        }
        return $testrow;
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

    public function errors($attributes) {
        $validoi_kisa_id = 'validoi_kisa_id';
        $validoi_kilpailija_id = 'validoi_kilpailija_id';
        $validoi_kisanumero = 'validoi_kisanumero';
        $errors = array_merge($this->{$validoi_kisa_id}(), $this->{$validoi_kilpailija_id}, $this->{$validoi_kisanumero}());
        return $errors;
    }

    public function validoi_kisa_id($kisa_id) {
        $errors = array();
        if ($kisa_id == '' || $kisa_id == null) {
            $errors[] = 'Kisa-ID ei saa olla tyhjä!';
        }
        $query2 = DB::connection()->prepare('SELECT id FROM Kisa WHERE id = :kisa_id');
        $query2->execute(array('kisa_id' => $kisa_id));
        $kisaid = $query2->fetchAll();
        if ($kisaid == null) {
            $errors[] = 'Kisa-ID:tä ei ole olemassa!';
        }

        return $errors;
    }

    public function validoi_kilpailija_id($kilpailija_id) {
        $errors = array();
        if ($kilpailija_id == '' || $kilpailija_id == null) {
            $errors[] = 'Kilpailija-ID ei saa olla tyhjä!';
        }
        $query2 = DB::connection()->prepare('SELECT id FROM Kilpailija WHERE id = :kilpailija_id');
        $query2->execute(array('kisa_id' => $kilpailija_id));
        $kilpailijaid = $query2->fetchAll();
        if ($kilpailijaid == null) {
            $errors[] = 'Kilpailija-ID:tä ei ole olemassa!';
        }

        return $errors;
    }

    public function validoi_kisanumero($attributes) {
        $errors = array();
        $kisa_id = $attributes['kisa_id'];
        $kilpailija_id = $attributes['kilpailija_id'];
        $kisanumero = $attributes['kisanumero'];
        if ($kisanumero == '' || $kisanumero == null) {
            $errors[] = 'Kisanumero ei saa olla tyhjä!';
        }
        $query2 = DB::connection()->prepare('SELECT kisanumero FROM Aika WHERE kisa_id = :kisa_id AND kilpailija_id = :kilpailija_id AND kisanumero = :kisanumero');
        $query2->execute(array('kisa_id' => $kisa_id, 'kilpailija_id' => $kilpailija_id, 'kisanumero' => $kisanumero));
        $kisanumeroquery = $query2->fetchAll();
        if (!($kisanumeroquery == null)) {
            $errors[] = 'Kisanumero on jo olemassa!';
        }

        return $errors;
    }

}
