<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("HomePage");


Route::get('/submit', [\App\Http\Controllers\MessageController::class,"submit"])->name("SubmitPage");

Route::get('/posted', [\App\Http\Controllers\MessageController::class,"redirectToSubmit"]);
Route::post('/posted', [\App\Http\Controllers\MessageController::class,"store"])->name("StoreMessage");

Route::get('/search', [\App\Http\Controllers\MessageController::class,"search"])->name("search");

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/terms', function () {
    return view('terms');
});
