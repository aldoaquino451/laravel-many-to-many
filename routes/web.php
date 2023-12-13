<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rotte Guest
Route::get('/', [PageController::class, 'index'])->name('home');

// Rotte Admin
Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // Rotta Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        // Rotte Resource
        Route::resource('projects', ProjectController::class);
        Route::resource('tecnologies', TecnologyController::class);
        Route::resource('types', TypeController::class);
        // Rotte Custom
        Route::get('projects-type', [TypeController::class, 'projectsType'])->name('projects-type');
    });

// Rotte Profile
Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
