<?php

class Kisa extends BaseModel {

    public $id, $nimi, $ajankohta;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validoi_nimi', 'validoi_ajankohta');
    }

    public static function all($options) {
        $query_string = 'SELECT * FROM Kisa';

        if (isset($options['page']) && isset($options['page_size'])) {
            $page_size = $options['page_size'];
            $page = $options['page'];
        } else {
            $page_size = 10;
            $page = 1;
        }
        
        $options['limit'] = $page_size;
        $options['offset'] = $page_size * ($page - 1);

        if (isset($options['search'])) {
            $query_string .= ' WHERE nimi LIKE :search';
        }
        
        $query_string .= ' LIMIT :limit, OFFSET :offset';
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

}
