<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api/'], function ($app) {
    $app->get('login/','UsersController@authenticate');
    $app->post('register/','UsersController@register');

    $app->post('regions/','RegionsController@store');
    $app->get('regions/','RegionsController@index');
    $app->get('regions/{id}','RegionsController@show');
    $app->post('regions/{id}','RegionsController@update');
    $app->delete('regions/{id}','RegionsController@destroy');

    $app->post('communes/','CommunesController@store');
    $app->get('communes/','CommunesController@index');
    $app->get('communes/{id}','CommunesController@show');
    $app->post('communes/{id}','CommunesController@update');
    $app->delete('communes/{id}','CommunesController@destroy');

    $app->post('customers/','CustomersController@store');
    $app->get('customers/','CustomersController@index');
    $app->get('customers/{id}','CustomersController@show');
    $app->post('customers/email','CustomersController@showEmail');
    $app->post('customers/{dni}/{id_reg}/{id_com}','CustomersController@update');
    $app->delete('customers/{id}/{id_reg}/{id_com}','CustomersController@destroy');
});