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

Route::get('/articles', 'ArticlesController@index')->name('articles:index');
Route::get('/articles/create', 'ArticlesController@create')->name('articles:create');
Route::post('/articles/create', 'ArticlesController@store')->name('articles:store');