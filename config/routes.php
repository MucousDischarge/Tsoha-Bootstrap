<?php

$routes->get('/', function() {
    $sivu = 1;
    HelloWorldController::index($sivu);
});

$routes->get('/listaussivu/:sivu', function($sivu) {
    HelloWorldController::index($sivu);
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/kirjautuminen', function() {
    HelloWorldController::kirjautuminen();
});

$routes->get('/kisa', function() {
    KisaController::index(1);
});

$routes->get('/kisa/listaussivu/:sivu', function($sivu) {
    KisaController::index($sivu);
});

$routes->get('/kisa/lisays', function() {
    KisaController::lisaysnakyma();
});

$routes->post('/kisa/', function() {
    KisaController::lisays();
});

$routes->get('/kisa/:id', function($id) {
    KisaController::esittely($id, 1);
});

$routes->get('/kisa/:id/listaussivu/:sivu', function($id, $sivu) {
    KisaController::esittely($id, $sivu);
});

$routes->get('/kisa/:id/:valipiste', function($id, $valipiste) {
    KisaController::valipiste_esittely($id, $valipiste, 1);
});

$routes->get('/kisa/:id/:valipiste/listaussivu/:sivu', function($id, $valipiste, $sivu) {
    KisaController::valipiste_esittely($id, $valipiste, $sivu);
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
    KilpailijaController::index(1);
});

$routes->get('/kilpailija/listaussivu/:sivu', function($sivu) {
    KilpailijaController::index($sivu);
});

$routes->get('/kilpailija/lisays', function() {
    KilpailijaController::lisaysnakyma();
});

$routes->post('/kilpailija/', function() {
    KilpailijaController::lisays();
});

$routes->get('/kilpailija/:id', function($id) {
    KilpailijaController::esittely($id, 1);
});

$routes->get('/kilpailija/:id/listaussivu/:sivu', function($id, $sivu) {
    KilpailijaController::index($id, $sivu);
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

$routes->get('/kisanumero', function() {
    KisanumeroController::lisaysnakyma();
});

$routes->post('/kisanumero', function() {
    KisanumeroController::lisays();
});