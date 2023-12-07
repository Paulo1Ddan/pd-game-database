<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\ConsoleController;
use App\Http\Controllers\Site\MainController;
use App\Mail\TesteMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/dashboard', function () {
    return view('app.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/actions', function() {
    return view('app.actions.actions');
})->middleware(['auth', 'verified'])->name('app.actions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/console', '\App\Http\Controllers\App\ConsoleController');
    Route::match(['put', 'patch'], '/console/{console}/img', [ConsoleController::class, 'updateImg'])->name('console.update.img');
    Route::resource('/difficulty', '\App\Http\Controllers\App\DifficultyController');
    Route::resource('/genre', '\App\Http\Controllers\App\GenreController');
    Route::resource('/score', '\App\Http\Controllers\App\ScoreController');
    Route::resource('/types', '\App\Http\Controllers\App\TypeController');
});


require __DIR__.'/auth.php';
