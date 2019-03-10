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
    Route::get('/', 'AnimalController@animal')->name('animal');
    Route::post('/', 'AnimalController@store')->name('animal-store');
    Route::get('/choice', 'AnimalController@animalChoice')->name('animal-choice');

});


