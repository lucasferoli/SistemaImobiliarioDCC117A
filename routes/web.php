<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;


use App\Http\Middleware\Admin;
use App\Http\Middleware\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(Admin::class)->group(function () {
    
    Route::prefix('admin')->group(function () {
        
            Route::get('/dashboard', function() {
            return view('admin.dashboard');
            })->name("admin.dashboard");
            

            Route::get('/imoveisCrud', [PropertyController::class, 'index'])->name('admin.imoveisCrud');
            Route::get('/usuariosCrud', function() {
            return view('admin.usuariosCrud');
            })->name("admin.usuariosCrud");

            Route::post('/imoveisCrud/create', [PropertyController::class, 'store'])->name('properties.store');
            Route::put('/imoveisCrud/{property}', [PropertyController::class, 'update'])->name('properties.update');
            Route::delete('/imoveisCrud/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    
    });

});


Route::middleware(User::class)->group(function () {
    Route::get('/perfil', function() {
        return view('perfil');
    })->name("perfil");
});