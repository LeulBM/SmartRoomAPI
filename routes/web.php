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

$router->group(['prefix' => 'shades'], function () use ($router) {
	$router->get('/', ['uses' => 'ShadesController@getCurrent']);

	$router->post('/', ['uses' => 'ShadesController@setHeight']);
});

$router->group(['prefix' => 'doors'], function () use ($router) {
	$router->get('/', ['uses' => 'DoorController@temp']);
});

$router->group(['prefix' => 'face'], function () use ($router) {
	$router->get('/', ['uses' => 'FaceController@temp']);
});

$router->group(['prefix' => 'trash'], function () use ($router) {
	$router->get('/', ['uses' => 'TrashController@temp']);
});


