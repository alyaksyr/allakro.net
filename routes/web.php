<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ActeurController;
use App\Http\Controllers\Admin\PharmacieController;
use App\Http\Controllers\Admin\CompetenceController;
use App\Http\Controllers\Admin\ActiviteController;
use App\Http\Controllers\Admin\EpidemieController;
use App\Http\Controllers\Admin\HopitalController;
use App\Http\Controllers\Admin\InteretController;
use App\Http\Controllers\Admin\ProjetController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\PropositionController;
use App\Http\Controllers\ProfileController;
use App\Models\Competence;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('page')->name('page.')->group(function(){
    Route::get('declarations', [DeclarationController::class, 'index'])->name('declarations.index');
    Route::get('declarations/{declaration}', [DeclarationController::class, 'show'])->name('declarations.show');
    Route::get('activites', [ActeurController::class, 'index'])->name('activites.index');
    Route::get('activites/{activite}', [ActeurController::class, 'show'])->name('activites.show');
    Route::get('competences', [CompetenceController::class, 'index'])->name('competences.index');
    Route::get('competences/{competence}', [CompetenceController::class, 'show'])->name('competences.show');
    Route::get('interets', [InteretController::class, 'index'])->name('interets.index');
    Route::get('interets/{interet}', [InteretController::class, 'show'])->name('interets.show');
    Route::get('pharmacies', [PharmacieController::class, 'index'])->name('pharmacies.index');
    Route::get('pharmacies/{pharmacie}', [PharmacieController::class, 'show'])->name('pharmacies.show');
    Route::get('hopitaux', [HopitalController::class, 'index'])->name('hopitaux.index');
    Route::get('hopitaux/{hopital}', [HopitalController::class, 'show'])->name('hopitaux.show');
    Route::get('epidemies', [EpidemieController::class, 'index'])->name('epidemies.index');
    Route::get('epidemies/{epidemie}', [EpidemieController::class, 'show'])->name('epidemies.show');
    Route::get('projets', [ProjetController::class, 'index'])->name('projets.index');
    Route::get('projets/{projet}', [ProjetController::class, 'show'])->name('projets.show');
    Route::get('offres', [PropositionController::class, 'index'])->name('offres.index');
    Route::get('offres/{offre}', [PropositionController::class, 'show'])->name('offres.show');

});

Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'connexion'])
->middleware('guest')
->name('login');
Route::get('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register'])
->middleware('guest')
->name('register');
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'dologin']);
Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'save']);
Route::delete('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])
->middleware('auth')
->name('logout');

Route::prefix('compte')->name('compte.')->middleware('auth')->group(function(){
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('profile/{profile}/edit', [ProfileController::class], 'edit')->name('profile.edit');
    Route::get('activites/{activite}/edit', [ProfileController::class, 'edit_activite'])->name('activites.edit');
    Route::get('activites/create', [ProfileController::class, 'create_activite'])->name('activites.create');
    Route::get('competence/{competence}/edit', [ProfileController::class, 'edit_competence'])->name('competences.edit');
    Route::get('competence/create', [ProfileController::class, 'create_competence'])->name('competences.create');
    Route::get('interets/{interet}/edit', [ProfileController::class, 'edit_interet'])->name('interets.edit');
    Route::get('interets/create', [ProfileController::class, 'create_interet'])->name('interets.create');
    Route::prefix('declaration')->name('declaration.')->group(function(){
        Route::get('index', [DeclarationController::class, 'index'])->name('index');
        Route::get('naissance', [DeclarationController::class, 'naissance'])->name('naissance');
        Route::get('deces', [DeclarationController::class, 'deces'])->name('deces');
        Route::post('create', [DeclarationController::class, 'store'])->name('store');
    });

    Route::resource('offres', PropositionController::class);
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::resource('acteurs', ActeurController::class);
    Route::resource('interets', InteretController::class)->except(['show']);
    Route::resource('activites', ActiviteController::class)->except(['show']);
    Route::resource('naissances', \App\Http\Controllers\Admin\NaissanceController::class)->except(['show']);
    Route::resource('demenages', \App\Http\Controllers\Admin\DemenageController::class)->except(['show']);
    Route::resource('amenages', \App\Http\Controllers\Admin\AmenageController::class)->except(['show']);
    Route::resource('decedes', \App\Http\Controllers\Admin\DecedeController::class)->except(['show']);
    Route::resource('declarations', DeclarationController::class)->except(['show']);
    Route::resource('pharmacies', PharmacieController::class);
    Route::resource('gardes', \App\Http\Controllers\Admin\PharmacieGardeController::class)->except(['show']);
    Route::resource('hopitals', HopitalController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceHopitalController::class)->except(['show']);
    Route::resource('competences', CompetenceController::class)->except(['show']);
    Route::resource('bons', \App\Http\Controllers\Admin\BonController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategorieController::class)->except(['show']);
    Route::resource('niveaux', \App\Http\Controllers\Admin\NiveauxController::class)->except(['show']);
    Route::resource('secteurs', \App\Http\Controllers\Admin\SecteursActivitesController::class)->except(['show']);
    Route::resource('projets', ProjetController::class)->except(['show']);
    Route::resource('epidemies', EpidemieController::class)->except(['show']);
});
