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

// Interact with Smart Shades
$router->group(['prefix' => 'shades'], function () use ($router) {
	$router->get('/', ['uses' => 'ShadesController@getCurrent']);	//Get current height of shades, 0 being fully closed and 100 fully open

	$router->post('/', ['uses' => 'ShadesController@setHeight']);	//Set curtain height to desired height
});

// Interact with Gatekeeper
$router->group(['prefix' => 'doors'], function () use ($router) {
	$router->get('/', ['uses' => 'DoorController@temp']);
});

// Interact with Face Sensor
$router->group(['prefix' => 'face'], function () use ($router) {
	$router->get('/', ['uses' => 'FaceController@temp']);
});

// Interact with Smart Trash Can
$router->group(['prefix' => 'trash'], function () use ($router) {
	$router->get('/', ['uses' => 'TrashController@temp']);
});


