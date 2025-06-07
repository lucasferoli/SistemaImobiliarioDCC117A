<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;

use App\Http\Middleware\Admin;
use App\Http\Middleware\User;




Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [LandingController::class, 'index'])->name('/');
Route::get('postIndividual/{id}', [IndividualController::class, 'index'])->name('properties.show');
Route::get('/imobifacil', function () {
    return view('quemSomos');
})->name('/quemSomos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('/profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('/dashboardUser');
    Route::post('/dashboard/create', [UserDashboardController::class, 'store'])->name('dashboard.store');
    Route::put('/dashboard/{property}', [UserDashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{property}', [UserDashboardController::class, 'destroy'])->name('dashboard.destroy');

    
});

Route::middleware(Admin::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/imoveisCrud', [PropertyController::class, 'index'])->name('admin.imoveisCrud');
        Route::post('/imoveisCrud/create', [PropertyController::class, 'store'])->name('properties.store');
        Route::put('/imoveisCrud/{property}', [PropertyController::class, 'update'])->name('properties.update');
        Route::delete('/imoveisCrud/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

        Route::get('/usuariosCrud', [UserController::class, 'index'])->name('admin.usuariosCrud');
        Route::post('/usuariosCrud/create', [UserController::class, 'store'])->name('users.store');
        Route::put('/usuariosCrud/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/usuariosCrud/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});
