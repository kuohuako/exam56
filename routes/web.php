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

Route::get('/exam/create', 'ExamController@create')->name('exam.create');

Route::get('/exam', 'ExamController@index')->name('exam.index');

Route::post('/exam', 'ExamController@store')->name('exam.store');
