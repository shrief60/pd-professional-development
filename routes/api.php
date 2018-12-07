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


Route::resource('{course}/units', 'UnitController')->only('index', 'store');
Route::resource('units', 'UnitController')->only('destroy', 'show');
// Since FormData doesn't support PUT method, so we are forced to use POST method instead.
Route::post('units/{unit}', 'UnitController@update')->name('units.update');


Route::resource('{unit}/lessons', 'LessonController')->only('index', 'store');
Route::resource('lessons', 'LessonController')->only('destroy', 'show');
// Since FormData doesn't support PUT method, so we are forced to use POST method instead.
Route::post('lessons/{lesson}', 'LessonController@update')->name('lessons.update');


Route::resource('{lesson}/questions', 'QuestionController')->only('index', 'store');
Route::resource('questions', 'QuestionController')->only('destroy', 'show');
// Since FormData doesn't support PUT method, so we are forced to use POST method instead.
Route::post('question/{question}', 'QuestionController@update')->name('questions.update');


