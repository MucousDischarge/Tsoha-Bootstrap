<?php

class MalliController extends BaseController{
  public static function index(){
    $malli = Malliluokka::all();
    View::make('kisa/index.html', array('malli' => $malli));
  }
}

