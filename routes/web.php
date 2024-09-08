<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Redirect to /todo after login
Route::get('/', function () {
    return redirect()->route('todo.index');
})->middleware(['auth']);  // Apply auth middleware here

// Todo app routes, protected by auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';
