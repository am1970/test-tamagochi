<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/animals', 'AnimalController@animals')->name('animals');

Route::middleware('auth')->prefix('animal')->group(function () {
    Route::get('/choice', 'AnimalController@choice')->name('animal-choice');
    Route::post('/', 'AnimalController@store')->name('animal-store');

    Route::get('/', 'AnimalController@animal')->name('animal');

    Route::put('/attribute/{attribute}', 'UserAnimalAttributeController@update')->name('update-user-animal-attribute');

});


