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
    return view('Store');
});


//usuario
Route::post('/createusuario','UsuarioController@create');
Route::post('/login','UsuarioController@login');
Route::get('/cerrarsession','UsuarioController@cerrarsession');
Route::get('/existuser','UsuarioController@existuser');
Route::get('/getusuario','UsuarioController@getuser');

//materia
Route::post('/createmateria','MateriaController@create');
Route::post('/updatemateria','MateriaController@update');
Route::get('/Materia/{id}','MateriaController@index');
Route::get('/Course/{id}','MateriaController@studentview');
Route::get('/eliminarmateria/{id}','MateriaController@delete');
Route::get('/getmateria/{id}','MateriaController@getmateria');

//contenido
Route::post('/createcontenido','ContenidoController@create');
Route::post('/updatecontenido','ContenidoController@update');
Route::get('/Contenido/{id}','ContenidoController@view');
Route::get('/Content/{id}','ContenidoController@studentview');
Route::get('/eliminarcontenido/{id}','ContenidoController@delete');
Route::get('/getcontenido/{id}','ContenidoController@getcontenido');


//tarea
Route::post('/createtarea','TareaController@create');
Route::post('/updatetarea','TareaController@update');
Route::get('/Tarea/{id}','TareaController@view');
Route::get('/Homework/{id}','TareaController@studentview');
Route::get('/eliminartarea/{id}','TareaController@delete');
Route::get('/gettarea/{id}','TareaController@gettarea');

//presentacion
Route::post('/Presentacion/create','PresentacionController@create');
Route::post('/calificacion','PresentacionController@calificar');

//inscripcion
Route::post('/createinscripcion','InscripcionController@create');
Route::post('/eliminarinscripcion','InscripcionController@delete');
Route::get('/eliminarmiinscripcion/{id}','InscripcionController@deleteme');
Route::get('/Miembros/{id}','InscripcionController@view');
Route::get('/Classmates/{id}','InscripcionController@viewStudent');


//paginas de inicio
Route::get('/Desktop','UsuarioController@desktop');
Route::get('/Home','UsuarioController@home');