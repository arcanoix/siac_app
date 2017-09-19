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
Route::get('/showBusiness/{id}', 'BusinessController@show');
Route::put('/update_b/{id}', 'BusinessController@update');
Route::delete('/business_delete/{id}','BusinessController@destroy');

//rutas para mangas
Route::get('manga','MangaController@index');
Route::post('manga_save','MangaController@store');
Route::get('/show_m/{id}','MangaController@show');
Route::put('/update_m/{id}','MangaController@update');
Route::delete('/manga_del/{id}','MangaController@destroy');

//rutas para numero telefonico
Route::get('numero_telefonico', 'NumeroTController@index');
Route::post('numero_save','NumeroTController@store');
Route::get('/showNum/{id}','NumeroTController@show');
Route::put('/update_N/{id}','NumeroTController@update');
Route::get('numero_telefonico1','NumeroTController@indexn');
Route::delete('/numero_delete/{id}','NumeroTController@destroy');

Route::get('numero_espera','NumeroTController@numeroE');

//rutas para clientes
Route::get('clientes', 'ClientesController@index');
Route::post('clientes_save','ClientesController@store');
Route::get('/showCliente/{id}', 'ClientesController@show');
Route::put('/update_cli/{id}', 'ClientesController@update');
Route::delete('/cliente_delete/{id}','ClientesController@destroy');

//rutas para ads
Route::get('/ads', 'AdsController@index');
Route::post('ads_save','AdsController@store');
Route::get('/showAds/{id}','AdsController@show');
Route::put('/update_a/{id}', 'AdsController@update');
Route::delete('/ads_delete/{id}','AdsController@destroy');

//rutas para servicios
Route::get('servicios','ServicioController@index');
Route::post('servicios_save','ServicioController@store');
Route::get('/show_s/{id}','ServicioController@show');
Route::put('/update_s/{id}','ServicioController@update');
Route::delete('/servicio_del/{id}','ServicioController@destroy');

//rutas para las fallas
Route::get('fallas','FallaController@index');
Route::post('falla_save','FallaController@store');
Route::get('/show_f/{id}','FallaController@show');
Route::put('/update_f/{id}','FallaController@update');
Route::delete('/falla_del/{id}','FallaController@destroy');
Route::get('mapa','FallaController@mapa');

//rutas para tanques
Route::get('tanques','TanqueController@index');
Route::post('tanque_save','TanqueController@store');
Route::get('/show_t/{id}','TanqueController@show');
Route::put('/update_t/{id}','TanqueController@update');
Route::delete('/tanque_del/{id}','TanqueController@destroy');

//Rutas para Central
Route::get('/central','CentralTController@index');
Route::post('central_save','CentralTController@store');
Route::get('/show_c/{id}','CentralTController@show');
Route::put('/update_c/{id}','CentralTController@update');
Route::delete('/central_del/{id}','CentralTController@destroy');

//rutas para sector
Route::post('save_sector','EstateController@sector');
Route::get('/show_s/{id}','EstateController@show');
Route::put('update_s/{id}','EstateController@update');


Route::get('grafica','FallaController@grafica');

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
Route::get('sectorT','EstateController@sectorT');
Route::get('M','EstateController@getMID');
Route::get('/parroquia/{id}','EstateController@getParish');
Route::get('parroquia','EstateController@getP');
