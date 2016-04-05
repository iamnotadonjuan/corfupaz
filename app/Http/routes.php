<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::resource('corfupaz', 'CorfupazController');

/*Route::get('/', function () {
    return view('welcome');
});*/






/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

  Route::get('/','FrontController@index');
  Route::get('nosotros','FrontController@nosotros');
  Route::get('map','FrontController@map');
  Route::get('download','FrontController@download');
  Route::get('atencion','FrontController@atencion');
  Route::get('contacto','FrontController@contacto');
  Route::get('cultivos','FrontController@cultivos');

  Route::get('auth/register', 'Auth\AuthController@getRegister');
  Route::post('auth/register', 'Auth\AuthController@postRegister');
  Route::get('auth/login', 'Auth\AuthController@getLogin');
  Route::post('auth/login', 'Auth\AuthController@postLogin');
  Route::get('auth/logout', 'Auth\AuthController@getLogout');

  Route::get('user', 'UsuarioController@user');
  Route::get('user/profile', 'UsuarioController@profile');
  Route::post('user/updateprofile','UsuarioController@updateProfile');
  Route::get('user/password','UsuarioController@password');
  Route::post('user/updatepassword','UsuarioController@updatePassword');
  Route::get('user/comments','UsuarioController@comments');
  Route::post('user/createcomment','UsuarioController@createComment');
  Route::post('user/deletecomment','UsuarioController@deleteComment');
  Route::post('user/editcomment','UsuarioController@editComment');
  Route::get('user/upload','UsuarioController@upload');
  Route::post('user/uploadimage','UsuarioController@uploadImage');
  Route::post('user/deleteimage','UsuarioController@deleteImage');

  Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin');

  Route::get('admin', 'AdminController@admin');


  Route::resource('usuario','UsuarioController');


});
