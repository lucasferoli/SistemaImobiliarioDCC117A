<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
            
            Route::get('/imoveisCrud', function() {
                return view('admin.imoveisCrud');
            })->name("admin.imoveisCrud");
        
            Route::get('/usuariosCrud', function() {
            return view('admin.usuariosCrud');
            })->name("admin.usuariosCrud");

    });
    
});
   
    Route::middleware(Customer::class)->group(function () {
    
            Route::get('/perfil', function() {
                return view('perfil');
            })->name("perfil");
    });
    
    
