<?php

use App\Http\Controllers\ExerciseController;
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

Route::get('/', [ExerciseController::class, 'index'])->name('accueil');
Route::get('/module/{slug}', [ExerciseController::class, 'all'])->name('module');
Route::get('/exercices', [ExerciseController::class, 'allExercises'])->name('exercice.all');
Route::get('/exercice/{slug}', [ExerciseController::class, 'show'])->name('exercice');
Route::get('/recherche/{slug}', [ExerciseController::class, 'search'])->name('recherche');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
