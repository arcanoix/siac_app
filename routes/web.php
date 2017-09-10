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
Route::get('/login#/', function () {
    return view('admin.login');
})->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('mapa', function(){
	return view('map');
});

//rutas ejemplo

Route::get('/site',function(){
		return view('admin.site');
});


/*ruta de reportes*/

Route::get('falla_reporte', 'PdfController@fallas');
Route::get('cliente_reporte','PdfController@cliente');
Route::get('usuario_reporte', 'PdfController@usuario');


/* Ruta modulo usuarios */
Route::get('/users', 'UserController@index');
Route::post('/users_save', 'UserController@store');
Route::delete('/users_del/{id}', 'UserController@destroy');
Route::get('/showUser/{id}', 'UserController@show');
Route::put('/update_user/{id}', 'UserController@update');
Route::get('tecnicos','UserController@getTecnicos');

/*----*/


/* Ruta modulo empresas */
Route::get('/business', 'BusinessController@index');
Route::post('/business_save', 'BusinessController@store');
Route::delete('/business_delete/{id}','BusinessController@destroy');

//rutas para mangas
Route::get('manga','MangaController@index');
Route::post('manga_save','MangaController@store');
Route::delete('/manga_del/{id}','MangaController@destroy');

//rutas para numero telefonico
Route::get('numero_telefonico', 'NumeroTController@index');
Route::post('numero_save','NumeroTController@store');
Route::delete('/numero_delete/{id}','NumeroTController@destroy');

Route::get('numero_espera','NumeroTController@numeroE');

//rutas para clientes
Route::get('clientes', 'ClientesController@index');
Route::post('clientes_save','ClientesController@store');
Route::delete('/cliente_delete/{id}','ClientesController@destroy');

//rutas para ads
Route::get('ads', 'AdsController@index');
Route::post('ads_save','AdsController@store');
Route::get('/showAds/{id}','AdsController@show');
Route::delete('/ads_delete/{id}','AdsController@destroy');

//rutas para servicios
Route::get('servicios','ServicioController@index');
Route::post('servicios_save','ServicioController@store');
Route::delete('/servicio_del/{id}','ServicioController@destroy');

//rutas para las fallas
Route::get('fallas','FallaController@index');
Route::post('falla_save','FallaController@store');
Route::delete('/falla_del/{id}','FallaController@destroy');

//rutas para tanques
Route::get('tanques','TanqueController@index');
Route::post('tanque_save','TanqueController@store');
Route::delete('/tanque_del/{id}','TanqueController@destroy');

//Rutas para Central
Route::get('central','CentralTController@index');
Route::post('central_save','CentralTController@store');
Route::delete('/central_del/{id}','CentralTController@destroy');

//Rutas Dashboard
Route::get('dashboard','DashboardController@index');

//Ruta chat
Route::get('chat', function(){
  return view('admin.chat');
});


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

Route::get('estado', 'EstateController@index');
Route::get('municipio','EstateController@getM');
Route::get('sector','EstateController@getS');
Route::get('M','EstateController@getMID');
Route::get('/parish/{id}','EstateController@getParish');
Route::get('parroquia','EstateController@getP');
