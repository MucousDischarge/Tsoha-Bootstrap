<?php

class KilpailijaController extends BaseController {

    public static function index() {
        $kilpailijat = Kilpailija::all();
        View::make('kilpailija/index.html', array('kilpailijat' => $kilpailijat));
    }

    public static function lisaysnakyma() {
        self::check_logged_in();
        View::make('kilpailija/new.html');
    }

    public static function lisays() {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'nimi' => $params['nimi']
        );

        $kilpailija = new Kilpailija($attributes);
        $errors = $kilpailija->errors();

        if (count($errors) == 0) {
            $kilpailija->save();

            Redirect::to('/kilpailija/' . $kilpailija->id, array('message' => 'Kilpailija on lisätty listaan!'));
        } else {
            View::make('kisa/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function esittely($id) {
        $kilpailija = Kilpailija::find($id);
        View::make('kilpailija/esittely.html', array('kilpailija' => $kilpailija));
    }
    
    public static function edit($id) {
        self::check_logged_in();
        $kilpailija = Kilpailija::find($id);
        View::make('kilpailija/edit.html', array('attributes' => $kilpailija));
    }

    public static function update($id) {
        $params = $_POST;

        $attributes = array(
        'id' => $id,
        'nimi' => $params['nimi']
        );

        $kilpailija = new Kilpailija($attributes);
        $errors = $kilpailija->errors();

        if (count($errors) == 0) {
            $kilpailija->update();

            Redirect::to('/kilpailija/' . $kilpailija->id, array('message' => 'Kilpailijaa on muokattu onnistuneesti!'));
          
        } else {
           View::make('kisa/edit.html', array('errors' => $errors, 'attributes' => $attributes));  
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $kilpailija = new Kilpailija(array('id' => $id));
        $kilpailija->destroy();

        Redirect::to('/kilpailija', array('message' => 'Kilpailija on poistettu onnistuneesti!'));
    }

}