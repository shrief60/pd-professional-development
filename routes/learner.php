<?php

Route::get('/', function () {
    dump('Hello Learner');
})->name('home');

Route::middleware('web', 'learner', 'auth:learner')
    ->group(function () {
        getRoutes();
    });

Route::middleware('web', 'api', 'multiauth:learnerAPI')
    ->prefix('api')
    ->name('api.')
    ->group(function () {
        getRoutes();
    });


function getRoutes()
{
    Route::resource('courses', 'CourseController')->only('index', 'show');
    Route::resource('{course}/units', 'UnitController')->only('index', 'show');
    Route::resource('{unit}/lessons', 'LessonController')->only('index', 'show');
    Route::resource('{question}/answers', 'AnswerController')->only('store');
        // Route::resource('quizzes', 'QuizController')->only('store');

    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('profile/{learner?}', 'ProfileController@show')->name('profile.show');
    Route::post('profile', 'ProfileController@update')->name('profile.update');

    Route::any('/test', function() {
        return App\Unit::first()->lessonsOrder();
    });
}
