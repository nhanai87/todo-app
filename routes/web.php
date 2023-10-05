<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Display the task list with filters
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // Show the form for creating a new task
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

    // Store a newly created task in the database
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    // Display the specified task
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

    // Show the form for editing the specified task
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

    // Update the specified task in the database
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

    // Remove the specified task from the database
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
