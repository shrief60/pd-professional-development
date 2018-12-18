<?php


Route::get('/', 'DashboardController')->name('home');

Route::resource('courses', 'CourseController')->only('index', 'show');
Route::resource('{course}/units', 'UnitController')->only('index', 'show');
Route::resource('{unit}/lessons', 'LessonController')->only('index');
Route::resource('lessons', 'LessonController')->only('show');
Route::resource('{question}/answers', 'AnswerController')->only('store');
    // Route::resource('quizzes', 'QuizController')->only('store');

Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::get('profile/{learner?}', 'ProfileController@show')->name('profile.show');
Route::post('profile', 'ProfileController@update')->name('profile.update');
