<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function() {
    dump('Hello Learner');
})->name('home');
