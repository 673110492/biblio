<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/liste-cours', [HomeController::class, 'cours'])->middleware(['auth', 'verified'])->name('liste-cours');
Route::get('/liste-epreuves', [HomeController::class, 'epreuves'])->middleware(['auth', 'verified'])->name('liste-epreuves');
Route::get('/liste-livres', [HomeController::class, 'livres'])->middleware(['auth', 'verified'])->name('liste-livres');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('epreuves', EpreuveController::class);
    Route::resource('filieres', FiliereController::class);
    Route::resource('livres', LivreController::class);
    Route::resource('matieres', MatiereController::class);
    Route::resource('niveaux', NiveauController::class);
    Route::resource('users', UserController::class);

});


Route::middleware(['auth'])->group(function () {
    Route::get('cours', [CoursController::class, 'index'])->name('cours.index');
    Route::get('cours/create', [CoursController::class, 'create'])->name('cours.create');
    Route::post('cours', [CoursController::class, 'store'])->name('cours.store');
    Route::get('cours/{id}', [CoursController::class, 'show'])->name('cours.show');
    Route::get('cours/{id}/edit', [CoursController::class, 'edit'])->name('cours.edit');
    Route::put('cours/{id}', [CoursController::class, 'update'])->name('cours.update');
    Route::delete('cours/{id}', [CoursController::class, 'destroy'])->name('cours.destroy');
});

require __DIR__.'/auth.php';
