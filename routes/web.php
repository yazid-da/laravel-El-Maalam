<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MetierController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\NotesController;

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

Route::get('/', [MainController::class, 'accueil']);
Route::get('/metier/{metier}', [MetierController::class, 'show']);

Route::get('login_client', [ClientController::class, 'clientAuthentifier']);
Route::get('/inscrire_client', [ClientController::class, 'index']);
Route::post('connect', [ClientController::class, 'clientlogin']);
Route::get('/deconnect', [ClientController::class, 'clientlogout']);
Route::post('ajouter_client', [ClientController::class, 'store']);

Route::get('/inscrire_artisan', [ArtisanController::class, 'index']);
Route::post('ajouter_artisan', [ArtisanController::class, 'store']);

Route::post('ajouter_note', [NotesController::class, 'store']);

Route::get('/commande/{id}', [CommandeController::class, 'index']);
Route::post('confirmer', [CommandeController::class, 'store']);












Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
