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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS HOBBIES
Route::get('/CreateHobbie', 'HobbiesController@create')->name('hobbies.create');
Route::post('/hobbies/save', 'HobbiesController@save')->name('hobbies.save');
Route::get('/hobbie/{id}', 'HobbiesController@detail')->name('hobbies.detail');
/* Route::get('/hobbie/editar/{id}', 'HobbiesController@edit')->name('hobbies.edit'); */
Route::get('/hobbie/editarAdmin/{id}', 'HobbiesController@edit')->name('hobbies.editAdmin');
/* Route::post('/hobbies/update', 'HobbiesController@update')->name('hobbies.update'); */
Route::post('/hobbies/updateAdmin', 'HobbiesController@updateAdmin')->name('hobbies.updateAdmin');
Route::get('/editAdmin/{id}', 'HobbiesController@editAdmin')->name('hobbies.detailAdmin');
Route::get('/hobbies/edit/{id}', 'HobbiesController@editHobbies')->name('editHobbies');
Route::get('/hobbies/listUser/{id}', 'HobbiesController@editHobbies')->name('editHobbies');
Route::get('/index/{id}', 'HobbiesController@index')->name('index');

//RUTAS USUARIOS
Route::get('/Registro', 'RegistroController@index')->name('Registro');
Route::post('/Register/user', 'RegistroController@create')->name('Register.user');
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
Route::get('/usuarios/{search?}', 'UserController@index')->name('user.index');


