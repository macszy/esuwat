<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\TaskManager;
use App\Livewire\TaskList;

Route::get('/', function () {
    return view('welcome');
});

//Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Task Management Route (Livewire)
Route::middleware(['auth'])->group(function (){
    Route::get('/tasks', TaskManager::class)->name('tasks.index');
    Route::get('/livewire/task-manager', TaskManager::class)->name('task.manager');
    Route::get('/task-manager', TaskManager::class)->name('task.manager');
    Route::get('/tasks', TaskList::class)->name('tasks.index');
    Route::get('/task-list', TaskList::class)->name('task.list');
});

//Authentication routes
require __DIR__.'/auth.php';


