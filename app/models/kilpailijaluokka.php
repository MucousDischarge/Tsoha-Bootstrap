<?php

class Kilpailija extends BaseModel {

    public $id, $nimi;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validoi_nimi');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kilpailija');
        $query->execute();
        $rows = $query->fetchAll();
        $kilpailijat = array();

        foreach ($rows as $row) {
            $kilpailijat[] = new Kilpailija(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
        }

        return $kilpailijat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kilpailija WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kilpailija = new Kilpailija(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));

            return $kilpailija;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kilpailija (nimi) VALUES (:nimi) RETURNING id');
        $query->execute(array('nimi' => $this->nimi));
        $row = $query->fetch();

        $this->id = $row['id'];
    }

    public function errors() {
        $validoi_nimi = 'validoi_nimi';
        $errors = array_merge($this->{$validoi_nimi}());
        return $errors;
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Kilpailija SET nimi = :nimi  WHERE id = :id');
        $query->execute(array('id' => $this->id, 'nimi' => $this->nimi));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Kilpailija WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

}
