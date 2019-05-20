<?php

use App\Capitulo;

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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@dashboard')->name('dashboard');
Route::get('novela/imagen/{filename}', 'NovelaController@getImage')->name('novela.imagen');
//NovelasLigeras
Route::get('novela', 'NovelaController@index')
								->name('novela.index');

Route::get('novela/crear', 'NovelaController@create')
								->name('novela.crear');



Route::post('novela/guardar', 'NovelaController@store')
								->name('novela.store');

Route::get('novela/{id}/editar', 'NovelaController@edit')
								->name('novela.editar');
Route::get('novela/{id}/{name?}', 'NovelaController@show')->name('novela.show');

Route::post('novela/{id}/actualizar', 'NovelaController@update')
								->name('novela.actualizar');

Route::post('novela/{id}/eliminar', 'NovelaController@destroy')
								->name('novela.eliminar');



//Capitulos
Route::get('capitulo', 'CapituloController@index')
						->name('capitulo.index')
						->middleware('permission:capitulo.index');

Route::get('novela/{novel}/{name}/{id}', 'CapituloController@show')->name('capitulo.show');

Route::get('capitulo/crear', 'CapituloController@create')
								->name('capitulo.crear')
								->middleware('permission:capitulo.crear');

Route::post('capitulo/guardar', 'CapituloController@store')
								->name('capitulo.store')
								->middleware('permission:capitulo.crear');

Route::get('capitulo/{id}/editar', 'CapituloController@edit')
								->name('capitulo.editar')
								->middleware('permission:capitulo.editar');

Route::post('capitulo/{id}/actualizar', 'CapituloController@update')
								->name('capitulo.actualizar')
								->middleware('permission:capitulo.editar');

Route::post('capitulo/{id}/eliminar', 'CapituloController@destroy')
								->name('capitulo.eliminar')
								->middleware('permission:capitulo.eliminar');

//Novelas Favoritas
Route::get('biblioteca', 'FavoritasController@index')->name('favoritas.index');
Route::get('favoritas/agregar/{id}', 'FavoritasController@addNovel')->name('favoritas.agregar');
Route::get('favoritas/eliminar/{id}', 'FavoritasController@deleteNovel')->name('favoritas.eliminar');

//Permissions
Route::get('permisos', 'Admin\PermissionsController@index')->name('permission.index');
Route::get('permisos/agregar', 'Admin\PermissionsController@create')->name('permission.create');
Route::patch('permisos/agregar', 'Admin\PermissionsController@store')->name('permission.store');
Route::get('permisos/{id}/editar', 'Admin\PermissionsController@edit')->name('permission.edit');
Route::patch('permisos/{id}/editar', 'Admin\PermissionsController@update')->name('permission.update');
Route::patch('permisos/{id}/eliminar', 'Admin\PermissionsController@destroy')->name('permission.destroy');

//Roles
Route::get('roles', 'Admin\RolesController@index')->name('role.index');
Route::get('roles/agregar', 'Admin\RolesController@create')->name('role.create');
Route::patch('roles/agregar', 'Admin\RolesController@store')->name('role.store');
Route::get('roles/{id}/editar', 'Admin\RolesController@edit')->name('role.edit');
Route::patch('roles/{id}/editar', 'Admin\RolesController@update')->name('role.update');
Route::patch('roles/{id}/eliminar', 'Admin\RolesController@destroy')->name('role.destroy');
Route::get('roles/{id}/detalles', 'Admin\RolesController@show')->name('role.show');

//Users
Route::get('usuarios', 'Admin\UsersController@index')->name('user.index');
Route::get('usuarios/agregar', 'Admin\UsersController@create')->name('user.create');
Route::patch('usuarios/agregar', 'Admin\UsersController@store')->name('user.store');
Route::get('usuarios/{id}/editar', 'Admin\UsersController@edit')->name('user.edit');
Route::patch('usuarios/{id}/editar', 'Admin\UsersController@update')->name('user.update');
Route::patch('usuarios/{id}/eliminar', 'Admin\UsersController@destroy')->name('user.destroy');
Route::get('usuarios/editar', 'Admin\UsersController@show')->name('user.show');
Route::get('usuarios/actualizar', 'Admin\UsersController@config')->name('user.config');
