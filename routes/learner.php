<?php


Route::get('/', function() {
    dump('Hello Learner');
})->name('home');


Route::resource('courses', 'CourseController')->only('index', 'show');
Route::resource('{course}/units', 'UnitController')->only('index', 'show');
Route::resource('{unit}/lessons', 'LessonController')->only('index', 'show');
