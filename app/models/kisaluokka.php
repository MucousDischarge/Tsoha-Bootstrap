<?php

class Kisa extends BaseModel {

    public $id, $nimi, $ajankohta, $valipisteet;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validoi_nimi', 'validoi_ajankohta', 'validoi_valipisteet');
    }

    public static function all($options, $page) {
        $query_string = 'SELECT * FROM Kisa';

        if (isset($options['page_size'])) {
            $page_size = $options['page_size'];
        } else {
            $page_size = 10;
        }
        
        $options['limit'] = $page_size;
        $options['offset'] = $page_size * ($page - 1);

        if (isset($options['search'])) {
            $query_string .= ' WHERE nimi LIKE :search';
        }
        
        $query_string .= ' ORDER BY ajankohta DESC';
        
        $query_string .= ' LIMIT :limit OFFSET :offset';
        $query = DB::connection()->prepare($query_string);
        
        $query->execute($options);
        $rows = $query->fetchAll();
        $kisat = array();

        foreach ($rows as $row) {
            $kisat[] = new Kisa($row);
        }

        return $kisat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kisa WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kisa = new Kisa($row);

            return $kisa;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kisa (nimi, ajankohta, valipisteet) VALUES (:nimi, :ajankohta, :valipisteet) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'ajankohta' => $this->ajankohta, 'valipisteet' => $this->valipisteet));
        $row = $query->fetch();

        $this->id = $row['id'];
    }

    public function errors() {
        $validoi_ajankohta = 'validoi_ajankohta';
        $validoi_nimi = 'validoi_nimi';
        $validoi_valipisteet = 'validoi_valipisteet';
        $errors = array_merge($this->{$validoi_ajankohta}(), $this->{$validoi_nimi}(), $this->{$validoi_valipisteet}());
        return $errors;
    }

    public function validoi_ajankohta() {
        $errors = array();
        if ($this->ajankohta == '' || $this->ajankohta == null) {
            $errors[] = 'Ajankohta ei saa olla tyhjä!';
        }
        if (strlen($this->ajankohta) < 3) {
            $errors[] = 'Ajankohdan pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }
    
    public function validoi_valipisteet() {
        $errors = array();
        if ($this->valipisteet == '' || $this->valipisteet == null) {
            $errors[] = 'Pistemäärä ei saa olla tyhjä!';
        }
        if (strlen($this->valipisteet) > 99) {
            $errors[] = 'Pisteitä ei voi olla näin paljon!';
        }

        return $errors;
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Kisa SET nimi = :nimi, ajankohta = :ajankohta, valipisteet = :valipisteet  WHERE id = :id');
        $query->execute(array('id' => $this->id, 'nimi' => $this->nimi, 'ajankohta' => $this->ajankohta, 'valipisteet' => $this->valipisteet));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Kisa WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function count() {
        $query = DB::connection()->prepare('SELECT * FROM Kisa');
        $query->execute();
        $rows = $query->fetchAll();
        $kisat = 0;

        foreach ($rows as $row) {
            $kisat++;
        }

        return $kisat;
    }
    
    public function count_esittely($kisat) {
        $maara = 0;

        foreach ($kisat as $kisa) {
            $maara++;
        }

        return $maara;
    }
    
    public function return_valipisteet($kisa) {
        $query = DB::connection()->prepare('SELECT valipisteet FROM Kisa WHERE id = :kisa_id');
        $query->execute(array('kisa_id' => $kisa));
        $row = $query->fetch();

        return $row;
    }
    
    public static function nimi($kisa) {
        $query = DB::connection()->prepare('SELECT nimi FROM Kisa WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $kisa[0]));
        $row = $query->fetch();

        return $row[0];
    }

}
