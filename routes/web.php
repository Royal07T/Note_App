<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
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
});

Route::controller(NoteController::class)
 ->prefix('notes')
 ->name('notes.')
 ->middleware(['auth'])
 ->group(
    function () {
        // Index: Display a listing of the resource (homepage for this example)
        Route::get('/', 'index')->name('index');
        // Create: Show the form for creating a new resource
        Route::get('/create', 'create')->name('create');
        // Store: Store a newly created resource in storage
        Route::post('/store', 'store')->name('store');
        // Show: Display the specified resource
        Route::get('/{id}', 'show')->name('show');
        // Edit: Show the form for editing the specified resource
        Route::get('/{id}/edit', 'edit')->name('edit');
        // Update: Update the specified resource in storage
        Route::put('/{id}', 'update')->name('update');
        // Destroy: Remove the specified resource from storage
        Route::delete('/notes/{id}', 'destroy')->name('destroy');
    });

require __DIR__.'/auth.php';
