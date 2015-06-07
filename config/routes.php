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

$routes->get('/kisa', function() {
    KisaController::index();
});

$routes->get('/kisa/lisays', function() {
    KisaController::lisaysnakyma();
});

$routes->post('/kisa/', function() {
    KisaController::lisays();
});

$routes->get('/kisa/:id', function($id) {
    KisaController::esittely($id);
});

$routes->get('/kisa/:id/edit', function($id) {
    KisaController::edit($id);
});
$routes->post('/kisa/:id/edit', function($id) {
    KisaController::update($id);
});

$routes->post('/kisa/:id/destroy', function($id) {
    KisaController::destroy($id);
});

$routes->get('/login', function(){
  KirjautumisController::login();
});

$routes->post('/login', function(){
  KirjautumisController::handle_login();
});