<?php

class KisaController extends BaseController {

    public static function index($page) {
        $params = $_GET;

        if (isset($params['search'])) {
            $options = array('search' => $params['search']);
        } else {
            $options = array();
        }
        
        $kisat = Kisa::all($options, $page);
        $kisat_count = Kisa::count();
        $page_size = 10;
        $pages = ceil($kisat_count / $page_size);
        View::make('kisa/index.html', array('kisat' => $kisat, 'pages' => $pages));
    }
    
    public static function lisaysnakyma() {
        self::check_logged_in();
        View::make('kisa/new.html');
    }

    public static function lisays() {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'nimi' => $params['nimi'],
            'ajankohta' => $params['ajankohta']
        );

        $kisa = new Kisa($attributes);
        $errors = $kisa->errors();

        if (count($errors) == 0) {
            $kisa->save();

            Redirect::to('/kisa/' . $kisa->id, array('message' => 'Kisa on lisätty listaan!'));
        } else {
            View::make('kisa/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function esittely($id) {
        $kisa = Kisa::find($id);
        View::make('kisa/esittely.html', array('kisa' => $kisa));
    }
    
    public static function edit($id) {
        self::check_logged_in();
        $kisa = Kisa::find($id);
        View::make('kisa/edit.html', array('attributes' => $kisa));
    }

    public static function update($id) {
        $params = $_POST;

        $attributes = array(
        'id' => $id,
        'nimi' => $params['nimi'],
        'ajankohta' => $params['ajankohta']
        );

        $kisa = new Kisa($attributes);
        $errors = $kisa->errors();

        if (count($errors) > 0) {
            View::make('kisa/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $kisa->update();

            Redirect::to('/kisa/' . $kisa->id, array('message' => 'Kisaa on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $kisa = new Kisa(array('id' => $id));
        $kisa->destroy();

        Redirect::to('/kisa', array('message' => 'Kisa on poistettu onnistuneesti!'));
    }

}
