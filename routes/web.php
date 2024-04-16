<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class,"home"])->name("HomePage");

Route::get('/terms', function () {
    return view('terms');
})->name("termsPage");


Route::get('/submit', [\App\Http\Controllers\MessageController::class,"submit"])->name("SubmitPage");

Route::get('/posted', [\App\Http\Controllers\MessageController::class,"redirectToSubmit"]);
Route::post('/posted', [\App\Http\Controllers\MessageController::class,"store"])->name("StoreMessage");

Route::get('/search', [\App\Http\Controllers\MessageController::class,"search"])->name("search");

Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class,"feedback"])->name("feedbackPage");
Route::post('/feedback/store', [\App\Http\Controllers\FeedbackController::class,"store"])->name("saveFeedback");


