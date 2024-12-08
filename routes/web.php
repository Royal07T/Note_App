<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect root to the notes index page
Route::redirect('/', '/notes')->name('dashboard');

// Group routes for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    // Resourceful routes for NoteController
    Route::resource('notes', NoteController::class);
});

// Group routes for authenticated users (for profile-related routes)
Route::middleware(['auth'])->group(function () {
    // Edit the user profile
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update the user profile
    Route::put('/user/profile', [ProfileController::class, 'update'])->name('profile.update'); // Use PUT here

    // Or use PATCH if you prefer
    // Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update'); // Use PATCH here

    // Destroy the user profile (or user account)
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes (Login, Register, etc.)
require __DIR__ . '/auth.php';
