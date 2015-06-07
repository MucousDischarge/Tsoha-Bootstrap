<?php

class KisaController extends BaseController {

    public static function index() {
        $kisat = Kisa::all();
        View::make('kisa/index.html', array('kisat' => $kisat));
    }

    public static function lisaysnakyma() {
        View::make('kisa/new.html');
    }

    public static function lisays() {
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
            // Pelissä oli jotain vikaa :(
            View::make('kisa/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function esittely($id) {
        $kisa = Kisa::find($id);
        View::make('kisa/esittely.html', array('kisa' => $kisa));
    }
    
    public static function edit($id) {
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
        $kisa = new Kisa(array('id' => $id));
        $kisa->destroy();

        Redirect::to('/kisa', array('message' => 'Kisa on poistettu onnistuneesti!'));
    }

}
