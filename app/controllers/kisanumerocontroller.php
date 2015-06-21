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

        $kisanumero = new Aika();
        $errors = $kisanumero->errors($attributes);

        if (count($errors) == 0) {
            $kisanumero->save($attributes);

            Redirect::to('/kisanumero/new.html', array('message' => 'Kilpailija liitetty kisaan!'));
        } else {
            View::make('kisanumero/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }
    
    public static function destroy($id) {
        self::check_logged_in();
        $kisa = new Kisa(array('id' => $id));
        $kisa->destroy();

        Redirect::to('/kisa', array('message' => 'Kisa on poistettu onnistuneesti!'));
    }

}