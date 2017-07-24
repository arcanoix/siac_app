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


Route::get('/', function () {
    return view('admin.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//rutas ejemplo

Route::get('/site',function(){
		return view('admin.site');
});



/* Ruta modulo usuarios */
Route::get('/users', 'UserController@index');
Route::post('/users_save', 'UserController@store');
Route::delete('/users_del/{id}', 'UserController@destroy');
Route::get('/showUser/{id}', 'UserController@show');


/* Ruta modulo empresas */
Route::get('/business', 'UserController@index');
Route::post('/business_save', 'UserController@store');






Route::get('/menu',function(){
	return view('admin.menu');
});
Route::get('/registro',function(){
	return view('admin.registro.registro');
});
Route::get('/registro/cliente',function(){
	return view('admin.registro.registro_cliente');
});
Route::get('/registro/falla',function(){
	return view('admin.registro.registro_falla');
});
Route::get('/registro/tecnico',function(){
	return view('admin.registro.registro_tecnico');
});
