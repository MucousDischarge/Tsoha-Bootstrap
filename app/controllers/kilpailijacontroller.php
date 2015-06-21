<?php

class KilpailijaController extends BaseController {

    public static function index($page) {
        $params = $_GET;

        if (isset($params['search'])) {
            $options = array('search' => $params['search']);
        } else {
            $options = array();
        }

        $kilpailijat = Kilpailija::all($options, $page);
        $kilpailijat_count = Kilpailija::count();
        $page_size = 10;
        $pages = ceil($kilpailijat_count / $page_size);
        foreach ($kilpailijat as $kilpailija) {
            $kisa_id = Aika::kilpailija_latest_id($kilpailija);
            $array[] = array('id' => $kilpailija->id, 'nimi' => $kilpailija->nimi, 'kisa_id' => $kisa_id, 'kisanimi' => Aika::kilpailija_latest_nimi($kisa_id));
        }
        View::make('kilpailija/index.html', array('kilpailijat' => $array, 'pages' => $pages));
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
            View::make('kilpailija/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function esittely($id, $page) {
        $kilpailija = Kilpailija::find($id);
        $kaikkikisat = Aika::kaikkikisat($id, $page);
        $kisat_count = Kisa::count_esittely($kaikkikisat);
        $page_size = 10;
        $pages = ceil($kisat_count / $page_size);
        foreach ($kaikkikisat as $kisa) {
            $aika = Aika::kilpailija_all($id, $kisa);
            $nimi = Kisa::nimi($kisa);
            if (isset($aika[2])) {
                $array[] = array('kisa_nimi' => $nimi, 'kisa_id' => $kisa[0], 'valipiste_id' => $aika[0], 'kisanumero' => $aika[1], 'aika' => $aika[2]);
            } else {
                $array[] = array('kisa_nimi' => $nimi, 'kisa_id' => $kisa[0], 'valipiste_id' => '1', 'kisanumero' => $aika[0], 'aika' => "Kisa ei alkanut.");
            }
        }
        View::make('kilpailija/esittely.html', array('kilpailija' => $kilpailija, 'kisat' => $array, 'pages' => $pages));
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
            View::make('kilpailija/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $kilpailija = new Kilpailija(array('id' => $id));
        $kilpailija->destroy();

        Redirect::to('/kilpailija', array('message' => 'Kilpailija on poistettu onnistuneesti!'));
    }

}
