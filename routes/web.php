<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::post('/send-message', [HomeController::class, 'submitContact'])->name('contact.submit');
