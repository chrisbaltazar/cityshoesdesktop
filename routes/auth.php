<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
//    Route::get('register', [RegisteredUserController::class, 'create'])
//        ->name('register');
//
//    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::get('login', 'create')->name('login');
        Route::post('login', 'store')->name('login.post');
    });
});

Route::middleware(Authenticate::class)->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
