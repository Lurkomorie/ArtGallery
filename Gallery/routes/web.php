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

Route::get('en', function() {
    session(['locale' => 'en']);
    return back();
});

Route::get('ru', function() {
    session(['locale' => 'ru']);
    return back();
});

Route::get('/map', function (){
    return view('map');
});


Route::get('/management', function (){
    $artists = App\User::all();
    return view('user.managers', compact('artists'));
});


Route::get('/info', function (){
    return view('info');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

Route::post('send', 'MailController@send');
Route::get('email','MailController@email');
Route::get('email/{id}', 'MailController@emailWithDrawing');



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

Route::get('/img/{id}', 'DrawingController@imgPage');

//routes for artists
Route::get('artists', 'UserController@index');
Route::get('userPage/{artistId}', 'UserController@userPage');
Route::get('userPage', 'UserController@userPage');

Route::get('/updateUser/{id}',['as' => 'update', 'uses' => 'UserController@getUpdateForm']);
Route::post('updateUser',['as' => 'update_user','uses' => 'UserController@update']);

Route::get('removeUser/{id}', 'UserController@remove');

Route::get('/addAvatar/{id}',['as' => 'add', 'uses' => 'UserController@getAddAvatarForm']);
Route::post('add_avatar',['as' => 'add_avatar','uses' => 'UserController@addAvatar']);

Route::post('addAvatar',['as' => 'find_artist','uses' => 'UserController@findArtist']);

Route::get('activate/{id}', 'UserController@activate');
Route::get('activate', 'UserController@aindex');

Route::get('setRole/{id}', 'UserController@getSetRole');
Route::post('setRole',['as' => 'set_role','uses' => 'UserController@setRole']);