<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/role/create', [RoleController::class, 'create']);
    Route::post('/role/store', [RoleController::class, 'store']);
    Route::get('/role/list', [RoleController::class, 'list'])->name('role.list');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update', [RoleController::class, 'update']);
    Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');
    Route::post('/role/update-status/{id}', [RoleController::class, 'updateStatus'])->name('role.updateStatus');
});

require __DIR__.'/auth.php';
