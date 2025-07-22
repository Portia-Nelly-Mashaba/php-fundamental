<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileGeneratorController;
use App\Http\Controllers\FixScriptController;
use App\Http\Controllers\AccessControlController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile-generator', [ProfileGeneratorController::class, 'index'])->name('profile-generator');
// Task 2
Route::get('/debugging', [FixScriptController::class, 'index'])->name('debugging-challenge');
Route::get('/debugging/{script}', [FixScriptController::class, 'showScript'])->name('show-script');

// Task 3
Route::get('/access-control/{role?}', [AccessControlController::class, 'index'])->name('access-control');