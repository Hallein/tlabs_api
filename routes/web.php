<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Auth routes
$router->post('/login', 'AuthController@login');

// User routes
$router->get('/users', 'UsersController@index');
$router->get('/users/{id}', 'UsersController@show');
$router->post('/users', 'UsersController@store');
$router->put('/users/{id}', 'UsersController@update');
$router->delete('/users/{id}', 'UsersController@delete');

// Comprobante routes
$router->get('/comprobantes', 'ComprobantesController@index');
$router->get('/comprobantes/{id}', 'ComprobantesController@show');
$router->post('/comprobantes', 'ComprobantesController@store');

// Noticias routes
$router->get('/noticias', 'NoticiasController@index');
$router->get('/noticias/{id}', 'NoticiasController@show');
$router->post('/noticias', 'NoticiasController@store');
$router->put('/noticias/{id}', 'NoticiasController@update');
$router->delete('/noticias/{id}', 'NoticiasController@delete');

// Actas routes
$router->get('/actas', 'ActasController@index');
$router->get('/actas/{id}', 'ActasController@show');
$router->post('/actas', 'ActasController@store');
$router->put('/actas/{id}', 'ActasController@update');
$router->delete('/actas/{id}', 'ActasController@delete');

// Temas routes
$router->delete('/temas/{id}', 'TemasController@delete');

// Acuerdos routes
$router->delete('/acuerdos/{id}', 'AcuerdosController@delete');