<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\DashboardController; // Add this line
use App\Http\Controllers\ProfileController; // Add this line
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get("/myTasks", [DashboardController::class, 'myTasks'])->name('myTasks');
    Route::post("/addYourTasks", [ActivitiesController::class, 'store'])->name('addTask');
    Route::delete("/deleteYourTasks/{id}", [ActivitiesController::class, 'destroy'])->name('deleteTask');
    Route::get("/cote/Projects", [DashboardController::class, 'projects'])->name('projects');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
