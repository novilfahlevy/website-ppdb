<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class)->parameters([
    'users' => 'id'
])->except(['show'])->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy'
]);