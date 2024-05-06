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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('loans', ['uses' => 'LoansController@createLoan']);
    $router->get('loans/{id}', ['uses' => 'LoansController@getLoan']);
    $router->put('loans/{id}', ['uses' => 'LoansController@updateLoan']);
    $router->delete('loans/{id}', ['uses' => 'LoansController@deleteLoan']);
    $router->get('loans', ['uses' => 'LoansController@getAllLoans']);
});
