<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ActeurController;
use App\Http\Controllers\Admin\PharmacieController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\PropositionController;

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
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('declaration')->name('declaration.')->group(function(){
    Route::get('index', [DeclarationController::class, 'index'])->name('index');
    Route::get('naissance', [DeclarationController::class, 'naissance'])->name('declarer.naissance');
    Route::get('deces', [DeclarationController::class, 'deces'])->name('declarer.deces');
    Route::post('create', [DeclarationController::class, 'store'])->name('store');
});
Route::resource('annonces', AnnonceController::class)->except(['destroy']);
Route::resource('propositions', PropositionController::class)->except(['destroy']);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('acteurs', ActeurController::class)->except(['show']);
    Route::resource('activites', \App\Http\Controllers\Admin\ActiviteController::class)->except(['show']);
    Route::resource('naissances', \App\Http\Controllers\Admin\NaissanceController::class)->except(['show']);
    Route::resource('demenages', \App\Http\Controllers\Admin\DemenageController::class)->except(['show']);
    Route::resource('amenages', \App\Http\Controllers\Admin\AmenageController::class)->except(['show']);
    Route::resource('decedes', \App\Http\Controllers\Admin\DecedeController::class)->except(['show']);
    Route::resource('declarations', \App\Http\Controllers\Admin\DeclarationController::class)->except(['show']);
    Route::get('pharmacies/garde/', [PharmacieController::class, 'garde'])->name('pharmacies.garde');
    Route::resource('pharmacies', PharmacieController::class)->except(['show']);
    Route::resource('hopitals', \App\Http\Controllers\Admin\HopitalController::class)->except(['show']);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceHopitalController::class)->except(['show']);
    Route::resource('competences', \App\Http\Controllers\Admin\CompetenceController::class)->except(['show']);
    Route::resource('bons', \App\Http\Controllers\Admin\BonController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategorieController::class)->except(['show']);
    Route::resource('niveaux', \App\Http\Controllers\Admin\NiveauxController::class)->except(['show']);
    Route::resource('secteurs', \App\Http\Controllers\Admin\SecteursActivitesController::class)->except(['show']);
});
