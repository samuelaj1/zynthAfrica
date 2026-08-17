<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::post('/contact-submit', [HomeController::class, 'submitContact'])->name('contact.submit');

Route::get('/contact-submit', function () {
    return 'Laravel reached';
});
