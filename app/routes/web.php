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

Route::get('/top', 'TopController@index')->name('top');

Route::prefix('mypage')->group(function () {
    Route::get('/', 'MyPageController@index')->name('mypage');
    Route::get('/edit', 'MyPageController@edit')->name('mypage.edit');
    Route::post('/update_image/{id}', 'MyPageController@update_image')->name('mypage.update_image');
    Route::post('/update/{id}', 'MyPageController@update')->name('mypage.update');
});
