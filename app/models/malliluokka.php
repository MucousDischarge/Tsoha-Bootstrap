<?php

class Malliluokka extends BaseModel{
    public $id, $nimi, $ajankohta, $nippelitieto;
    
    public function __construct($attributes){
      parent::__construct($attributes);
    }

    
    public static function all(){
        $query = DB::connection()->prepare('SELECT * FROM Kisa');
        $query->execute();
        $rows = $query->fetchAll();
        $malli = array();

        foreach($rows as $row){
          $malli[] = new Malliluokka(array(
            'id' => $row['id'],
            'nimi' => $row['nimi'],
            'ajankohta' => $row['ajankohta'],
            'nippelitieto' => $row['nippelitieto']
          ));
        }

        return $malli;
    }
    
    

    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Kisa WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row){
          $malli = new Malliluokka(array(
            'id' => $row['id'],
            'nimi' => $row['nimi'],
            'ajankohta' => $row['ajankohta'],
            'nippelitieto' => $row['nippelitieto']
          ));

          return $malli;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kisa (nimi, ajankohta, nippelitieto) VALUES (:nimi, :ajankohta, :nippelitieto) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'ajankohta' => $this->ajankohta, 'nippelitieto' => $this->nippelitieto));
        $row = $query->fetch();
        $this->id = $row['id'];
    }
}
