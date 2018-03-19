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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);





//router for events
Route::get('events', 'EventController@index');

Route::get('createEvent',['as' => 'create', 'uses' => 'EventController@getCreateForm']);
Route::post('createEvent',['as' => 'create_event','uses' => 'EventController@createNew']);

Route::get('/updateEvent/{id}',['as' => 'update', 'uses' => 'EventController@getUpdateForm']);
Route::post('updateEvent',['as' => 'update_event','uses' => 'EventController@update']);

Route::get('removeEvent/{id}', 'EventController@remove');

//routes for drawing
Route::get('/', 'DrawingController@index');

Route::post('/', ['as' => 'find_drawing', 'uses' => 'DrawingController@find']);

Route::get('/updateDrawing/{id}',['as' => 'update', 'uses' => 'DrawingController@getUpdateForm']);
Route::post('updateDrawing',['as' => 'update_drawing','uses' => 'DrawingController@update']);

Route::get('removeDrawing/{id}', 'DrawingController@remove');

Route::get('createDrawing',['as' => 'create', 'uses' => 'DrawingController@getCreateForm']);
Route::post('createDrawing',['as' => 'create_drawing','uses' => 'DrawingController@createNew']);

//routes for artists
Route::get('artists', 'UserController@index');
Route::get('userPage/{artistId}', 'UserController@userPage');
Route::get('userPage', 'UserController@userPage');

Route::get('/updateUser/{id}',['as' => 'update', 'uses' => 'UserController@getUpdateForm']);
Route::post('updateUser',['as' => 'update_user','uses' => 'UserController@update']);

Route::get('removeUser/{id}', 'UserController@remove');

