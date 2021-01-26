<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GareController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\TrajetController;
use App\Models\Gare;
use App\Models\Trajet;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    $trajets = Trajet::all();
    $gares = Gare::all();

    return view('welcome', compact('trajets', 'gares'));
});

Route::resource('gares', GareController::class);
Route::resource('trains', TrainController::class)->except('show');

Route::get('/trajets', [TrajetController::class, 'index'])->name('trajets.index');
Route::get('/trajets/create', [TrajetController::class, 'create'])->name('trajets.create');
Route::get('/trajets/{trajet}', [TrajetController::class, 'show'])->name('trajets.show');
Route::post('/trajets', [TrajetController::class, 'store'])->name('trajets.store');
Route::patch('/trajets/update', [TrajetController::class, 'update'])->name('trajets.update');
Route::delete('/trajets', [TrajetController::class, 'destroy'])->name('trajets.destroy');
Route::post('/trajets/recherche', [TrajetController::class, 'recherche'])->name('trajets.recherche');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
