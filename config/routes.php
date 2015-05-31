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
