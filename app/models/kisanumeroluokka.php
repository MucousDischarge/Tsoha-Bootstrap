<?php

class Kisanumero extends BaseModel {

    public $id, $nimi, $ajankohta;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validoi_nimi', 'validoi_ajankohta');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kisa');
        $query->execute();
        $rows = $query->fetchAll();
        $kisat = array();

        foreach ($rows as $row) {
            $kisat[] = new Kisa(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'ajankohta' => $row['ajankohta']
            ));
        }

        return $kisat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kisa WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kisa = new Kisa(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'ajankohta' => $row['ajankohta']
            ));

            return $kisa;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kisa (nimi, ajankohta) VALUES (:nimi, :ajankohta) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'ajankohta' => $this->ajankohta));
        $row = $query->fetch();

        $this->id = $row['id'];
    }

    public function errors() {
        $validoi_ajankohta = 'validoi_ajankohta';
        $validoi_nimi = 'validoi_nimi';
        $errors = array_merge($this->{$validoi_ajankohta}(), $this->{$validoi_nimi}());
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

    public function update() {
        $query = DB::connection()->prepare('UPDATE Kisa SET nimi = :nimi, ajankohta = :ajankohta  WHERE id = :id');
        $query->execute(array('id' => $this->id, 'nimi' => $this->nimi, 'ajankohta' => $this->ajankohta));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Kisa WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

}

