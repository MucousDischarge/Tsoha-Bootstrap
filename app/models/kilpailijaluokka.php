<?php

class Kilpailija extends BaseModel {

    public $id, $nimi;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validoi_nimi');
    }

    public static function all($options, $page) {
        $query_string = 'SELECT * FROM Kilpailija';

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

        $query_string .= ' ORDER BY nimi ASC';

        $query_string .= ' LIMIT :limit OFFSET :offset';
        $query = DB::connection()->prepare($query_string);

        $query->execute($options);
        $rows = $query->fetchAll();
        $kilpailijat = array();

        foreach ($rows as $row) {
            $kilpailijat[] = new Kilpailija($row);
        }

        return $kilpailijat;
    }

    public static function kisa_id($kilpailijat) {
        $query_string2 = 'Select kisa_id FROM Aika';
        $query_string2 .= ' WHERE kilpailija_id = :kilpailija_id';
        $query_string2 .= ' AND aika = (select max(aika.aika)';
        $query_string2 .= ' FROM (select aika from Aika where kilpailija_id = :kilpailija_id and CURRENT_TIMESTAMP > aika) as aika)';
        $query2 = DB::connection()->prepare($query_string2);
        $query2->execute(array('kilpailija_id' => $kilpailijat['id']));
        $row2 = $query2->fetchAll();
        if ($row2) {
            
        }
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kilpailija WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $kilpailija = new Kilpailija($row);

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

    public function count() {
        $query = DB::connection()->prepare('SELECT * FROM Kilpailija');
        $query->execute();
        $rows = $query->fetchAll();
        $kilpailijat = 0;

        foreach ($rows as $row) {
            $kilpailijat++;
        }

        return $kilpailijat;
    }

}
