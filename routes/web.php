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
Route::get('helloworld', function () {
    echo 'Hello World';
});


Route::group([
    'middleware' =>'auth',
    'prefix' => 'articles',
    'as' => 'articles:'
], function(){
    Route::get('/create', 'ArticlesController@create')->name('create');
    Route::post('/create', 'ArticlesController@store')->name('store');
    Route::get('/', 'ArticlesController@index')->name('index');
    Route::get('/edit/{article}', 'ArticlesController@edit')->name('edit');
    Route::post('/edit/{article}', 'ArticlesController@update')->name('update');
    Route::get('/delete/{article}', 'ArticlesController@delete')->name('delete');
    Route::get('/search', 'ArticlesController@search')->name('search');
});
