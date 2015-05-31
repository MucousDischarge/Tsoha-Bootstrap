<?php

class MalliController extends BaseController{
  public static function index(){
    $malli = Malliluokka::all();
    View::make('kisa/index.html', array('malli' => $malli));
  }
  
  public static function listausnakyma(){
      $allu = Malliluokka::all();
  }
  
  public static function esittelynakyma(){
      $eka = Malliluokka::find(1);
  }
  
  public static function lisaysnakyma(){
    
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

