<?php

use App\Models\User;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TenantDasboardController;
use App\Http\Controllers\AgencyDashboardController;
use App\Http\Controllers\DemarcheurDashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProprietaireDashboardController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;

Route::middleware([SetLocale::class])->group(function () {

    Route::get('lang/{locale}', [LocalizationController::class, 'changLang'])->name('chang.lang');

    Route::get('/', [HomeController::class, 'home'])->name('home');


    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {

        Route::prefix('agency')->controller(AgencyDashboardController::class)->middleware('role:agency_manager|agent')->group(function () {
            Route::get('/', 'index')->name('agency');
            Route::prefix('agents')->middleware(['role:agency_manager'])->group(function(){
                Route::get('/', 'agents')->name('agents') ;
                Route::get('/add', 'addAgent')->name('agents.create') ;
                Route::post('/add', 'addAgentStore')->name('agents.store') ;
                Route::get('/{agent}', 'agentShow')->name('agents.show') ;
            }) ;
        });

        Route::prefix('agent')->middleware(['role:agent'])->name('agent.')->group(function(){
            Route::get('/calendar', [ScheduleController::class, 'index'])->name('calendar.index') ;
            Route::get('/appointments', [ScheduleController::class, 'getAppointments'])->name('get.appointments') ;
            Route::get('/my-appointments', [ScheduleController::class, 'myAppointments'])->name('my.appointments') ;
            Route::get('/schedules', [ScheduleController::class, 'availability'])->name('schedules') ;
            Route::post('/schedules-store', [ScheduleController::class, 'storeAvailability'])->name('store.availability') ;
        }) ;

        Route::prefix('demarcheur')->controller(DemarcheurDashboardController::class)->middleware('role:demarcheur')->group(function () {
            Route::get('/', 'index')->name('demarcheur');
        });

        Route::prefix('proprietaire')->controller(ProprietaireDashboardController::class)->middleware('role:proprietaire')->group(function () {
            Route::get('/', 'index')->name('proprietaire');
        });

        Route::prefix('tenant')->controller(TenantDasboardController::class)->middleware('role:locataire')->group(function () {
            Route::get('/', 'index')->name('tenant');
        });

        Route::prefix('admin')->controller(AdminDashboardController::class)->middleware('role:admin|super-admin')->group(function () {
            Route::get('/', 'index')->name('admin');
        });
    });


    Route::middleware(['auth', 'role:agency_manager|agent|demarcheur|proprietaire'])->group(function () {
        Route::resource('properties', PropertyController::class)->except(['index', 'show']);
    });

    Route::resource('properties', PropertyController::class)->only(['index', 'show']);



    Route::get('/dashboard', function () {

        $user = Auth::user() ;

        $dashboardRoutes = [
            'super-admin' => 'dashboard.admin',
            'admin' => 'dashboard.admin',
            'agency_manager' => 'dashboard.agency',
            'agent' => 'dashboard.agency',
            'demarcheur' => 'dashboard.demarcheur',
            'proprietaire' => 'dashboard.proprietaire',
            'locataire' => 'dashboard.tenant',
        ];


        foreach ($dashboardRoutes as $role => $route) {
            if ($user->hasRole($role)) {
                return redirect()->intended(route($route));
            }
        }

        return redirect()->intended(route('home', absolute: false));

    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/faq', [FaqController::class, 'faq']) ;

    require __DIR__ . '/auth.php';
});
