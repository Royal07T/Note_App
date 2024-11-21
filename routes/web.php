<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

// Route::get('/', [NoteController::class, 'index'])->name('note.index');


// Index: Display a listing of the resource (homepage for this example)
// Route::get('/', [NoteController::class, 'index'])->name('note.index');

// // Create: Show the form for creating a new resource
// Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');

// // Store: Store a newly created resource in storage
// Route::post('/notes', [NoteController::class, 'store'])->name('note.store');

// // Show: Display the specified resource
// Route::get('/notes/{id}', [NoteController::class, 'show'])->name('note.show');

// // Edit: Show the form for editing the specified resource
// Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');

// // Update: Update the specified resource in storage
// Route::put('/notes/{id}', [NoteController::class, 'update'])->name('note.update');

// // Destroy: Remove the specified resource from storage
// Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('note.destroy');


Route::resource('notes', NoteController::class);
