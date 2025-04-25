<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pendaftaran', [HomeController::class, 'registration'])->name('registration');

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

Route::resource('registrations', RegistrationController::class)->parameters([
    'registrations' => 'id'
])->except(['show'])->names([
    'index' => 'registrations.index',
    'create' => 'registrations.create',
    'store' => 'registrations.store',
    'edit' => 'registrations.edit',
    'update' => 'registrations.update',
    'destroy' => 'registrations.destroy'
]);