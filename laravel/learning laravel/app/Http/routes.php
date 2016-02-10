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


Route::get('/', [
    'as' => '/', 
	'uses' => 'PagesController@getIndex'
]);

Route::get('about', [
    'as' => 'about', 
    'uses' => 'PagesController@getAbout'
]);

Route::get('contact', [
    'as' => 'contact', 
	'uses' => 'PagesController@getContact'
]);

Route::get('test/{id}', [
    'as' => 'test', 
	'uses' => 'PagesController@getTest'
]);

Route::resource('product', 'ProductController');

Route::get('basicrouting', function(){
    return view('welcome');
});

Route::match(['get', 'post', 'delete'], 'matchrouting', function () {
    return 'Match routing';
});

Route::any('anyroute', function(){
    return 'Any route';
});


Route::get('user/{id}/album/{albumId}', function($id,$albumId){
    return $id. ' '. $albumId;
});

Route::get('album/{id?}', function($id = 5){
    return $id;
});

Route::get('user/{id}', function($id){
    return $id;
})
->where('id', '[0-9]+');

Route::get('namedRoutes', [
    'as' => 'namedRoutes',
    'uses' => 'PagesController@getIndex'
        
]);

Route::group(['as' => 'admin::', 'prefix' => 'admin'], function(){
    Route::get('dashboard', [
    'as' => 'dashboard',
    'uses' => 'PagesController@getDashboard'
     ]);
    
    Route::get('reports', [
    'as' => 'reports',
    'uses' => 'PagesController@getReports'
     ]);
});











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
    //
});
