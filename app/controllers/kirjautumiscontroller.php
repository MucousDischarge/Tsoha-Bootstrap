<?php

class KirjautumisController extends BaseController{
  public static function login(){
      View::make('user/kirjautuminen.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $kayttaja = Kayttaja::authenticate($params['kayttajanimi'], $params['salasana']);

    if(!$kayttaja){
      View::make('kayttaja/kirjautuminen.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'kayttajanimi' => $params['kayttajanimi']));
    }else{
      $_SESSION['kayttaja'] = $kayttaja->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $kayttaja->kayttajanimi . '!'));
    }
  }
}