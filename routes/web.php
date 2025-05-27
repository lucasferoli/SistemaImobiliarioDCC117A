<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name("dashboard");
    });

});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/perfil', [UserController::class, 'perfil']);
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');