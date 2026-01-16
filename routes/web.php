<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main')->name("main");

Route::view('about', 'about');
Route::view('contactar', 'contactar');
Route::view('noticias', 'noticias');

Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['en', 'es', 'fr'])) {
        abort(400);
    }

    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/students', [StudentController::class, 'index'])
        ->middleware('role:admin|teacher|student')
        ->name('students.index');

    Route::get('/students/create', [StudentController::class, 'create'])
        ->middleware('role:admin')
        ->name('students.create');

    Route::post('/students', [StudentController::class, 'store'])
        ->middleware('role:admin')
        ->name('students.store');

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->middleware('role:admin|teacher')
        ->name('students.edit');

    Route::put('/students/{student}', [StudentController::class, 'update'])
        ->middleware('role:admin|teacher')
        ->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->middleware('role:admin|teacher')
        ->name('students.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
