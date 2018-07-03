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

Route::get('/', 'ListingController@index')->name('home'); //Page à l'arrivée

Route::get('animals', 'AnimalController@create')->name('display_create_animal');
Route::post('animals', 'AnimalController@store')->name('insert_animal');
Route::get('animals/{n}', 'AnimalController@create')->name('display_update_animal');

Route::post('animals/{n}', 'AnimalController@update')->name('update_animal');
Route::get('animals_delete/{n}', 'AnimalController@delete')->name('delete_animal');
