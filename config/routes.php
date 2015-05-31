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
    MalliController::index();
  });
  
  $routes->get('/kisa/new', function(){
    MalliController::create();
  });
  
  //$routes->get('/kisa/:id', function($id){
    //MalliController::show($id);
  //});
  
  $routes->post('/kisa', function(){
    MalliController::store();
  });
