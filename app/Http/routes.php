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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
	// Ruta de usuarios con Api-Restfull.
    Route::resource('users', 'UsersController');
    
    // Ruta Particular para eliminar usuarios.
    Route::get('users/{id}/destroy', [
    	'uses'	=>	'UsersController@destroy',
    	'as'	=>	'admin.users.destroy'
    ]);

	// Ruta de las categorias con Api-Restfull.
    Route::resource('categories', 'CategoriesController');

    // Ruta Particular para eliminar usuarios.
    Route::get('categories/{id}/destroy', [
    	'uses'	=>	'CategoriesController@destroy',
    	'as'	=>	'admin.categories.destroy'
    ]);

});