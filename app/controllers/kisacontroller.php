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
        $kisat = new Kisa(array(
            'nimi' => $params['nimi'],
            'ajankohta' => $params['ajankohta'],
            'nippelitieto' => $params['nippelitieto']
        ));

        $kisat->save();

        Redirect::to('/kisa/' . $kisat->id, array('message' => 'Kisa on lisätty listaan!'));
    }

    public static function esittely($id) {
        $kisa = Kisa::find($id);
        View::make('kisa/esittely.html', Kisa('kisa' => $kisa));
    }

}
