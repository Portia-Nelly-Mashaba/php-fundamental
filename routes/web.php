<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileGeneratorController;
use App\Http\Controllers\FixScriptController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile-generator', [ProfileGeneratorController::class, 'index'])->name('profile-generator');
// Task 2
Route::get('/debugging', [FixScriptController::class, 'index'])->name('debugging-challenge');
Route::get('/debugging/{script}', [FixScriptController::class, 'showScript'])->name('show-script');