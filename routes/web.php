<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileGeneratorController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile-generator', [ProfileGeneratorController::class, 'index'])->name('profile-generator');