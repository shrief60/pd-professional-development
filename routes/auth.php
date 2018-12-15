<?php

Route::domain(config('app.url'))
    ->namespace('Learner')
    ->name('learner.')
    ->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.store');
        Route::any('/logout', 'LoginController@logout')->name('logout');

        Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'RegisterController@register')->name('register.store');

        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('/password/reset', 'ResetPasswordController@reset');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm');
    });

Route::domain('admin.' . config('app.url'))

    ->namespace('Admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.store');
        Route::any('/logout', 'LoginController@logout')->name('logout');

        Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'RegisterController@register')->name('register.store');

        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('/password/reset', 'ResetPasswordController@reset');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm');
    });

Route::get('login/{provider}', 'SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'SocialAccountController@handleProviderCallback');
