<?php

class KisanumeroController extends BaseController {
    
    public static function lisaysnakyma() {
        self::check_logged_in();
        View::make('/kisanumero/new.html');
    }

    public static function lisays() {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'kisa_id' => $params['kisa_id'],
            'kilpailija_id' => $params['kilpailija_id'],
            'kisanumero' => $params['kisanumero']
        );

        $errors = Aika::errors($attributes);

        if (count($errors) == 0) {
            Aika::save($attributes);

            Redirect::to('/kisanumero/new.html', array('message' => 'Kilpailija liitetty kisaan!'));
        } else {
            View::make('/kisanumero/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }
    
    public static function destroy_from_kisa($kisa_id, $kilpailija_id) {
        self::check_logged_in();
        Aika::destroy($kisa_id, $kilpailija_id);

        Redirect::to('/kisa', array('message' => 'Kisanumero on poistettu onnistuneesti!'));
    }
    
    public static function destroy_from_kilpailija($kisa_id, $kilpailija_id) {
        self::check_logged_in();
        Aika::destroy($kisa_id, $kilpailija_id);

        Redirect::to('/kilpailija', array('message' => 'Kisanumero on poistettu onnistuneesti!'));
    }

}