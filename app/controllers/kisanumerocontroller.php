<?php

class KisanumeroController extends BaseController {
    
    public static function lisaysnakyma() {
        self::check_logged_in();
        View::make('kisanumero/new.html');
    }

    public static function lisays() {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'kisa_id' => $params['kisa_id'],
            'kilpailija_id' => $params['kilpailija_id'],
            'kisanumero' => $params['kisanumero']
        );

        $kisanumero = new Aika($attributes);
        $errors = $kisanumero->errors();

        if (count($errors) == 0) {
            $kisanumero->save();

            Redirect::to('/kisanumero', array('message' => 'Kilpailija liitetty kisaan!'));
        } else {
            View::make('kisanumero/new.html', array('errors' => $errors, 'attributes' => $attributes));
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