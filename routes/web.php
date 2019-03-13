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

Route::get('/',  ['as' => 'contacts.index', 'uses' => 'ContactController@index']); 


Route::resource('contacts', 'ContactController');
Route::get('contacts/delete/{id}', ['as' => 'contacts.delete', 'uses' => 'ContactController@destroy']);Route::get('contacts/show/{id}', ['as' => 'contacts.show', 'uses' => 'ContactController@show']);


