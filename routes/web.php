<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(Authenticate::class)->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(InventoryController::class)->group(function(){
       Route::get('/inventory', 'index')->name('inventory.index');
    });

    Route::controller(SalesController::class)->group(function(){
        Route::get('/sales', 'index')->name('sales.index');
        Route::post('/sales', 'store')->name('sales.store');
    });

    Route::controller(ReportController::class)->group(function(){
        Route::get('/report/{sale?}', 'show')->name('report.show');
    });
});

Route::redirect('/', '/dashboard');

require 'auth.php';
