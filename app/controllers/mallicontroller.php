<?php

class MalliController extends BaseController{
  public static function index(){
    $malli = Malliluokka::all();
    View::make('kisa/index.html', array('malli' => $malli));
  }
  
  public static function esittelynakyma(){
    $malli = Malliluokka::find(1);
    View::make('kisa/index.html', array('malli' => $malli));
  }
  
  public static function lisaysnakyma(){
    $malli = Malliluokka::all();
    View::make('kisa/new.html', array('malli' => $malli));
  }
 
  public static function lisays(){
    $params = $_POST;
    $malli = new Kisa(array(
      'nimi' => $params['nimi'],
      'ajankohta' => $params['ajankohta'],
      'nippelitieto' => $params['nippelitieto']
    ));
    
    Kint::dump($params);
    
    $malli->save();

    //Redirect::to('/kisa/' . $malli->id, array('message' => 'Kisa on lisätty listaan!'));
  }
}

