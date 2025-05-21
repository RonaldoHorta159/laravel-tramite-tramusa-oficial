<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\tipoTramiteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\tipoDoumentController;
use App\Http\Controllers\RoleController;


//no Auth routes
Route::get('/', [DashboardController::class, 'index']);



//auth routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/tipoDocumento', tipoDoumentController::class)->name('index', 'tipoDocumento');
    Route::resource('/tipoTramite', tipoTramiteController::class)->name('index', 'tipoTramite');
    Route::resource('/roles', RoleController::class)->name('index', 'roles');
    Route::resource('/nuevoDocumento', DocumentController::class)->name('index', 'nuevoDocumento');
});


