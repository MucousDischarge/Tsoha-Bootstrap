<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/hallinta', function() {
    HelloWorldController::hallinta();
  });
  
  $routes->get('/kisa', function(){
    KisaController::index();
  });
  
  $routes->get('/kisa/lisays', function(){
    KisaController::lisaysnakyma();
  });
  
  $routes->post('/kisa/', function(){
    KisaController::lisays();
  });
  
  $routes->get('/kisa/:id', function($id){
    KisaController::esittely($id);
  });
