<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

// Routes utilisant le contrôleur - ONE PAGE
Route::get('/', [SiteController::class, 'onepage'])->name('home');

Route::get('/portfolio', [SiteController::class, 'projects'])->name('portfolio');

Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

Route::post('/contact', [SiteController::class, 'sendMessage'])->name('contact.send');

Route::get('/about', [SiteController::class, 'about'])->name('about');
