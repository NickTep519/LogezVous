<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use App\Http\Middleware\SetLocale;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::middleware([SetLocale::class])->group(function () {

    Route::get('lang/{locale}', [LocalizationController::class, 'changLang'])->name('chang.lang') ;

    Route::get('/', [HomeController::class, 'home'] )->name('home');

    Route::resource('properties', PropertiesController::class) ;

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
});
