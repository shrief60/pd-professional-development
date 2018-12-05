<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */


Route::resource('courses', 'CourseController')->only('index', 'store', 'show', 'destroy');
// Since FormData doesn't support PUT method, so we are forced to use POST method instead.
Route::post('courses/{course}', 'CourseController@update')->name('courses.update');

Route::get('/{course}/units', 'UnitController@index');
Route::post('/{course}/units', 'UnitController@store');

Route::post('{unit}/lessons', 'LessonController@store');
