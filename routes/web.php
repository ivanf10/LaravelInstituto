<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main')->name("main");

Route::view('about', 'about');

Route::view('contactar', 'contactar');

Route::view('noticias', 'noticias');

Route::resource('alumnos', AlumnoController::class);

Route::get('/alumnos', [\App\Http\Controllers\AlumnoController::class, 'index'])
    ->name('alumnos.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
