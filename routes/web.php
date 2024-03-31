<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/submit', function () {
    return view('submit');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/terms', function () {
    return view('terms');
});
