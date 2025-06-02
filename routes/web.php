<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\FaxeController;
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

use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\SubjectController;

Route::get('/cours-liste', [CourseController::class, 'courseliste'])->name('cours.liste');
Route::get('/epreuves-liste', [SubjectController::class, 'listeEpreuve'])->name('epreuves.liste');


Route::get('/', [WelcomeController::class, 'index'])->name('home');



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


    Route::resource('filieres', FiliereController::class);
    Route::resource('livres', LivreController::class);
    Route::resource('matieres', MatiereController::class);
    Route::resource('niveaux', NiveauController::class);
    Route::resource('users', UserController::class);




Route::get('epreuves', [EpreuveController::class, 'index'])->name('epreuves.index');           // Liste des épreuves
Route::get('epreuves/create', [EpreuveController::class, 'create'])->name('epreuves.create');  // Formulaire création
Route::post('epreuves', [EpreuveController::class, 'store'])->name('epreuves.store');          // Enregistrer nouvelle épreuve
Route::get('epreuves/{epreuve}', [EpreuveController::class, 'show'])->name('epreuves.show');   // Voir détail épreuve
Route::get('epreuves/{epreuve}/edit', [EpreuveController::class, 'edit'])->name('epreuves.edit'); // Formulaire édition
Route::put('epreuves/{epreuve}', [EpreuveController::class, 'update'])->name('epreuves.update'); // Mettre à jour
Route::delete('epreuves/{epreuve}', [EpreuveController::class, 'destroy'])->name('epreuves.destroy'); // Supprimer


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



Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/faxes', [FaxeController::class, 'index'])->name('faxes.index');
    Route::get('/faxes/create', [FaxeController::class, 'create'])->name('faxes.create');
    Route::post('/faxes', [FaxeController::class, 'store'])->name('faxes.store');
    Route::get('/faxes/{fax}', [FaxeController::class, 'show'])->name('faxes.show');
    Route::get('/faxes/{fax}/edit', [FaxeController::class, 'edit'])->name('faxes.edit');
    Route::put('/faxes/{fax}', [FaxeController::class, 'update'])->name('faxes.update');
    Route::patch('/faxes/{fax}', [FaxeController::class, 'update']); // optionnel
    Route::delete('/faxes/{fax}', [FaxeController::class, 'destroy'])->name('faxes.destroy');
});



require __DIR__.'/auth.php';
