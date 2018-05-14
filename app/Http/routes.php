<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'AtividadeController@index');
Route::get('/edit', 'AtividadeController@edit');
Route::get('/edit/{id}', 'AtividadeController@edit');
Route::post('/save', 'AtividadeController@save');