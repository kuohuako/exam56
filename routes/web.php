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
Route::pattern('exam', '[0-9]+');
Route::pattern('topic', '[0-9]+');
Route::pattern('test', '[0-9]+');

Route::get('/', 'ExamController@index')->name('index');

Auth::routes();

Route::get('/home', 'ExamController@index')->name('home');

Route::resource('exam', 'ExamController');
// Route::get('/exam', 'ExamController@index')->name('exam.index');
// Route::get('/exam/{exam}', 'ExamController@show')->name('exam.show');
// Route::get('/exam/create', 'ExamController@create')->name('exam.create');
// Route::get('/exam/{exam}/edit', 'ExamController@edit')->name('exam.edit');
// Route::post('/exam', 'ExamController@store')->name('exam.store');
// Route::patch('/exam/{exam}', 'ExamController@update')->name('exam.update');
// Route::delete('/exam/{exam}', 'ExamController@destroy')->name('exam.destroy');

Route::resource('topic', 'TopicController');
// Route::get('/topic/{topic}/edit', 'TopicController@edit')->name('topic.edit');
// Route::post('/topic', 'TopicController@store')->name('topic.store');
// Route::patch('/topic/{topic}', 'TopicController@update')->name('topic.update');
// Route::delete('/topic/{topic}', 'TopicController@destroy')->name('topic.destroy');

Route::resource('test', 'TestController');
// Route::get('/test/{test}', 'TestController@show')->name('test.show');
// Route::post('/test', 'TestController@store')->name('test.store');

// 處理表單，導向至 NTPC OpenID 登入
Route::post('auth/login/openid', 'OpenIDController@ntpcopenid')->name('ntpcopenid');

// OpenID 導回
Route::get('auth/login/openid', 'OpenIDController@get_ntpcopenid')->name('get_ntpcopenid');
