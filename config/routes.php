<?php

$routes->get('/', function() {
    $sivu = 1;
    HelloWorldController::index($sivu);
});

$routes->get('/?page=:sivu', function($page) {
    HelloWorldController::index($page);
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/kirjautuminen', function() {
    HelloWorldController::kirjautuminen();
});

$routes->get('/kisa', function() {
    $sivu = 1;
    KisaController::index($sivu);
});

$routes->get('/kisa?page=:sivu', function($page) {
    KisaController::index($page);
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

$routes->post('/logout', function(){
  KirjautumisController::logout();
});

$routes->get('/kilpailija', function() {
    KilpailijaController::index();
});

$routes->get('/kilpailija/lisays', function() {
    KilpailijaController::lisaysnakyma();
});

$routes->post('/kilpailija/', function() {
    KilpailijaController::lisays();
});

$routes->get('/kilpailija/:id', function($id) {
    KilpailijaController::esittely($id);
});

$routes->get('/kilpailija/:id/edit', function($id) {
    KilpailijaController::edit($id);
});
$routes->post('/kilpailija/:id/edit', function($id) {
    KilpailijaController::update($id);
});

$routes->post('/kilpailija/:id/destroy', function($id) {
    KilpailijaController::destroy($id);
});