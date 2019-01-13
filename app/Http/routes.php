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

/* RUTAS Para el FrondEnt */

	Route::get('/', [ 
		'uses' => 'FrontController@index',
		'as' => 'front.index'
	]);		


/* RUTAS Para el Panel de Administracion. */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::get('/', [ 'as' => 'admin.index', function () {
		    return view('welcome');
		}]);

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

	// Ruta de los Tags con Api-Restfull.
    Route::resource('tags', 'TagsController');
    // Ruta Particular para eliminar usuarios.
    Route::get('tags/{id}/destroy', [
    	'uses'	=>	'TagsController@destroy',
    	'as'	=>	'admin.tags.destroy'
    ]);

	// Ruta de los Articulos con Api-Restfull.
    Route::resource('articles', 'ArticlesController');
    // Ruta Particular para eliminar usuarios.
    Route::get('articles/{id}/destroy', [
    	'uses'	=>	'ArticlesController@destroy',
    	'as'	=>	'admin.articles.destroy'
    ]);

    // Ruta para las Imagenes.
    Route::get('images', [
    	'uses'	=>	'ImagesController@index',
    	'as'	=>	'admin.images.index'
    ]);

});
// Ruta para iniciar session en el sistema.
Route::get('admin/auth/login', [
	'uses'	=>	'Auth\AuthController@getLogin',
	'as'	=>	'admin.auth.login'
]);
// Ruta para el envio de datos al loguearse.
Route::post('admin/auth/login', [
	'uses'	=>	'Auth\AuthController@postLogin',
	'as'	=>	'admin.auth.login'
]);
// Ruta para salir del sistema.
Route::get('admin/auth/logout', [
	'uses'	=>	'Auth\AuthController@getLogout',
	'as'	=>	'admin.auth.logout'
]);
